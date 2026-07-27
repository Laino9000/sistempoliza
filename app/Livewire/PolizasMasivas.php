<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\policies;
use App\Models\clientes;
use App\Models\currency;
use Illuminate\Support\Facades\Storage;


class PolizasMasivas extends Component
{
    use WithFileUploads;

    public $archivo;
    public $archivoZIP;
    public $datos = [];
    public $encabezados = [];
    public $errores = [];

    public $nombreArchivo;
    public $pesoArchivo;
    public $tipoArchivo;

    public $cargado = false;

    public function updatedArchivo()
    {
        if ($this->archivo) {
            $this->nombreArchivo = $this->archivo->getClientOriginalName();
            $this->tipoArchivo = $this->archivo->getClientOriginalExtension();
        } else {
            $this->reset(['nombreArchivo', 'tipoArchivo']);
        }
    }

    private function procesarZIP($pathZip)
    {
        $imagenesPorDocumento = [];
        $zip = new \ZipArchive;

        if ($zip->open($pathZip) === true) {
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $filename = $zip->getNameIndex($i);
                $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

                if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                    $nombreSinExtension = pathinfo($filename, PATHINFO_FILENAME);
                    $fileContent = $zip->getFromName($filename);

                    $imagenesPorDocumento[$nombreSinExtension] = $fileContent;

                    $soloNumeros = preg_replace('/[^0-9]/', '', $nombreSinExtension);

                    if ($soloNumeros != $nombreSinExtension) {
                        $imagenesPorDocumento[$soloNumeros] = $fileContent;
                    }
                }
            }
            $zip->close();
        }

        return $imagenesPorDocumento;
    }

    public function cargarPolizas()
    {
        try {
            $this->validate([
                'archivo' => 'required|file|mimes:xlsx,xls,csv,txt|max:10240',
                'archivoZIP' => 'required|file|mimes:zip|max:10240'
            ], [
                'archivo.required' => 'Debe elegir un archivo',
                'archivo.file' => 'Debe elegir un archivo',
                'archivo.mimes' => 'Debe elegir un archivo',
                'archivo.max' => 'Debe elegir un archivo',
                'archivoZIP.required' => 'Debe elegir un archivo',
                'archivoZIP.file' => 'Debe elegir un archivo',
                'archivoZIP.mimes' => 'Debe elegir un archivo',
                'archivoZIP.max' => 'Debe elegir un archivo'
            ]);

            $extension = $this->archivo->getClientOriginalExtension();
            $path = $this->archivo->getRealPath();

            // 1. Para Leer CSV
            switch ($extension) {
                case 'csv':
                    $this->leerCSV($path);
                    break;
                case 'txt':
                    $this->leerTXT($path);
                    break;
                default:
                    Log::warning('Extensión no soportada', ['extension' => $extension]);
                    throw new \Exception('Formato de archivo no soportado');
            }


            $imagenesPorDocumento = $this->procesarZIP($this->archivoZIP->getRealPath());


            foreach ($this->datos as $fila) {
                $documento = trim($fila->Documento);

                $documentoNormalizado = preg_replace('/[^0-9]/', '', $documento);

                $tieneImagen = false;


                if (isset($imagenesPorDocumento[$documento]) || isset($imagenesPorDocumento[$documentoNormalizado])) {
                    $tieneImagen = true;
                } else {

                    foreach ($imagenesPorDocumento as $nombreImagen => $ruta) {
                        $nombreNormalizado = preg_replace('/[^0-9]/', '', $nombreImagen);
                        if ($nombreNormalizado === $documentoNormalizado) {
                            $tieneImagen = true;
                            break;
                        }
                    }
                }

                $fila->tiene_imagen = $tieneImagen;
            }

            $this->cargado = true;
        } catch (\Exception $e) {
            $this->cargado = false;
            Log::error('Error al cargar polizas', [
                'mensaje' => $e->getMessage(),
                'archivo' => $this->archivo?->getClientOriginalName(),
                'linea' => $e->getLine()
            ]);
            throw ValidationException::withMessages([
                'archivo' => $e->getMessage(),
                'archivoZIP' => $e->getMessage()
            ]);
        }
    }

    public function limpiar()
    {
        $this->reset(['archivo', 'archivoZIP', 'datos', 'encabezados', 'errores']);
        $this->cargado = false;
        $this->resetErrorBag();
        $this->resetValidation();

        $this->dispatch('resetFileInputs');
    }

    public function procesarArchivo()
    {
        try {


            if (empty($this->datos)) {
                throw new \Exception('No hay datos para procesar. Primero carga los archivos.');
            }


            $imagenesPorDocumento = $this->procesarZIP($this->archivoZIP->getRealPath());

            $creados = 0;
            $errores = 0;
            $tasa = currency::where('currency', 'Dolar')->select('rate')->first();
            $monto = 0;

            foreach ($this->datos as $fila) {

                try {
                    $documento = trim($fila->Documento ?? '');
                    $nombreCompleto = trim($fila->Asegurado ?? '');
                    $partes = explode(' ', $nombreCompleto);
                    $primerNombre = $partes[0] ?? '';
                    $apellidos = implode(' ', array_slice($partes, 1)) ?? '';

                    $rutaImagen = null;
                    if (isset($imagenesPorDocumento[$documento])) {
                        $contenidoImagen = $imagenesPorDocumento[$documento];
                        $rutaImagen = 'cedula_' . $documento . '_' . time() . '.jpeg';
                        Storage::disk('public')->put($rutaImagen, $contenidoImagen);
                    } else {
                        $documentoNumeros = preg_replace('/[^0-9]/', '', $documento);
                        if (isset($imagenesPorDocumento[$documentoNumeros])) {
                            $contenidoImagen = $imagenesPorDocumento[$documentoNumeros];
                            $rutaImagen = 'cedula_' . $documento . '_' . time() . '.jpeg';
                            Storage::disk('public')->put($rutaImagen, $contenidoImagen);
                        }
                    }

                

                    $cliente = clientes::create([
                        'identity' => $documento,
                        'name' => $primerNombre,
                        'lastname' => $apellidos,
                        'telephone' => $fila->Telefono ?? '',
                        'age' => $fila->Edad ?? null,
                        'id_declarations' => null,
                        'photo_ID_path' => $rutaImagen,
                    ]);

                   
                    $ultimoId = policies::max('id') ?? 0;
                    $nuevoPolicyNumber = $ultimoId + 1;

                    
                    if ($fila->Edad <= 50) {
                        $pagar = 25;
                        $monto = number_format($pagar, 2);
                    } elseif ($fila->Edad <= 70) {
                        $pagar = 50;
                        $monto = number_format($pagar, 2);
                    } elseif ($fila->Edad <= 85) {
                        $pagar = 75;
                        $monto = number_format($pagar, 2);
                    } elseif ($fila->Edad <= 120) {
                        $pagar = 100;
                        $monto = number_format($pagar, 2);
                    } else {
                        $monto = number_format(0, 2);
                    }
                  
                    policies::create([
                        'client_id' => $cliente->id,
                        'policy_number' => $nuevoPolicyNumber,
                        'user_id' => 1,
                        'total' => $monto,
                        'currency' => 'USD',
                        'start_date' => now(),
                        'end_date' => now()->addYear(),
                        'notes' => 'Creado desde carga masiva',
                    ]);

                    $creados++;
                } catch (\Exception $e) {
                    $errores++;
                    Log::warning('Error al crear registro individual', [
                        'documento' => $fila->Documento ?? '',
                        'error' => $e->getMessage()
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error al crear registros', [
                'mensaje' => $e->getMessage(),
                'linea' => $e->getLine()
            ]);
        }
    }

    private function leerCSV($path)
    {
        $datos = [];
        if (($handle = fopen($path, "r")) !== FALSE) {
            $this->encabezados = fgetcsv($handle);

            while (($fila = fgetcsv($handle)) !== FALSE) {

                $datos[] = (object) array_combine($this->encabezados, $fila);
            }
            fclose($handle);
        }
        $this->datos = $datos;
        log::info('Datos leidos', ['datos' => $this->datos]);
    }

    private function leerTXT($path)
    {
        $contenido = file_get_contents($path);
        $lineas = explode("\n", $contenido);

        if (count($lineas) > 0) {
            $this->encabezados = explode("\t", trim($lineas[0]));

            for ($i = 1; $i < count($lineas); $i++) {
                if (trim($lineas[$i]) != '') {
                    $this->datosTabla[] = explode("\t", trim($lineas[$i]));
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.polizas.polizas-masivas')
            ->layout('dashboard');
    }
}
