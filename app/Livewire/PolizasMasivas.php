<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;

class PolizasMasivas extends Component
{
    use WithFileUploads;

    public $archivo;
    public $datosTabla = [];
    public $encabezados = [];
    public $errores = [];

    public $nombreArchivo;
    public $pesoArchivo;
    public $tipoArchivo;

    public function updatedArchivo()
    {
        if ($this->archivo) {
            $this->nombreArchivo = $this->archivo->getClientOriginalName();
            $this->tipoArchivo = $this->archivo->getClientOriginalExtension();
        } else {
            $this->reset(['nombreArchivo', 'tipoArchivo']);
        }
    }

    public function cargarPolizas()
    {
        try {
            $this->validate([
                'archivo' => 'required|file|mimes:xlsx,xls,csv,txt|max:10240'
            ]);

            $extension = $this->archivo->getClientOriginalExtension();
            $path = $this->archivo->getRealPath();

            Log::info('Iniciando carga de archivo', [
                'nombre' => $this->archivo->getClientOriginalName(),
                'extension' => $extension,
                'tamaño' => $this->archivo->getSize()
            ]);

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

            Log::info('Archivo procesado correctamente', [
                'filas' => count($this->datosTabla),
                'columnas' => count($this->encabezados)
            ]);
        } catch (\Exception $e) {
            Log::error('Error al cargar polizas', [
                'mensaje' => $e->getMessage(),
                'archivo' => $this->archivo?->getClientOriginalName(),
                'linea' => $e->getLine(),
                'traza' => $e->getTraceAsString()
            ]);

            $this->errores[] = 'Error: ' . $e->getMessage();
            session()->flash('error', 'Hubo un error al procesar el archivo. Revisa el log.');
        }
    }

    private function leerCSV($path)
    {
        $datos = [];
        if (($handle = fopen($path, "r")) !== FALSE) {
            $this->encabezados = fgetcsv($handle);

            while (($fila = fgetcsv($handle)) !== FALSE) {
                $datos[] = $fila;
            }
            fclose($handle);
        }
        $this->datosTabla = $datos;
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
