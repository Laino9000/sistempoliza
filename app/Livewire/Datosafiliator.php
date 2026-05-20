<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\policies;
use App\Models\clientes;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Session\Session;

class Datosafiliator extends Component
{
    use WithFileUploads;

    public $nombre;
    public $apellido;
    public $tipo_documento = 'V';
    public $cedula;
    public $prefijo = '+58';
    public $telefono;
    public $edad;
    public $foto_cedula;

    
    protected $rules = [
        'nombre' => 'required|min:3|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'apellido' => 'required|min:3|max:50|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
        'tipo_documento' => 'required|in:V,E,J,P',
        'cedula' => 'required|numeric|digits_between:6,10',
        'prefijo' => 'required|in:+58,+57,+1,+34',
        'telefono' => 'required|numeric|digits_between:7,15',
        'edad' => 'required|integer|between:18,100',
        'foto_cedula' => 'required|image|max:2048|mimes:jpg,jpeg,png',
    ];


    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio',
        'nombre.regex' => 'El nombre solo puede contener letras',
        'apellido.required' => 'El apellido es obligatorio',
        'apellido.regex' => 'El apellido solo puede contener letras',
        'cedula.required' => 'La cédula es obligatoria',
        'cedula.unique' => 'Esta cédula ya está registrada',
        'cedula.digits_between' => 'La cédula debe tener entre 6 y 10 dígitos',
        'telefono.required' => 'El teléfono es obligatorio',
        'telefono.digits_between' => 'El teléfono debe tener entre 7 y 15 dígitos',
        'edad.required' => 'La edad es obligatoria',
        'edad.between' => 'La edad debe estar entre 18 y 100 años',
        'foto_cedula.required' => 'La foto de la cédula es obligatoria',
        'foto_cedula.image' => 'El archivo debe ser una imagen',
        'foto_cedula.max' => 'La imagen no puede superar los 2MB',
        'foto_cedula.mimes' => 'La imagen debe ser JPG, JPEG o PNG',
    ];


    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function guardarAfiliado()
    {
        $this->validate();

        try {
            $cliente = $this->tipo_documento . '-' . $this->cedula;
            Log::info($cliente);

            $clientebuscado = clientes::where('identity', $cliente)->first();

            if ($clientebuscado) {
                session(['id_cliente' => $clientebuscado->id]);
                return redirect()->to('/afilitation/preguntasapersonas');
            }

      
            $nombrePersonalizado = 'cedula_' . $this->tipo_documento . $this->cedula . '_' . time() . '.' . $this->foto_cedula->getClientOriginalExtension();
            $this->foto_cedula->storeAs('cedulas', $nombrePersonalizado, 'public');

            $clientes = clientes::create([
                'identity' => $this->tipo_documento . '-' . $this->cedula,
                'name' => $this->nombre,
                'lastname' => $this->apellido,
                'telephone' => $this->prefijo . $this->telefono,
                'age' => $this->edad,
                'photo_ID_path' => $nombrePersonalizado,
            ]);

            $this->reset(['nombre', 'apellido', 'cedula', 'telefono', 'edad', 'foto_cedula']);
            $this->tipo_documento = 'V';
            $this->prefijo = '+58';

            session()->flash('success', '¡Afiliado registrado con éxito! Cliente: ' . $clientes->identity);
            session(['id_cliente' => $clientes->id]);

            return redirect()->to('/afilitation/preguntasapersonas');
        } catch (\Exception $e) {
            Log::error('Error al guardar afiliado:', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            session()->flash('error', 'Error al registrar el afiliado: ' . $e->getMessage());

     
            return redirect()->back();
        }
    }

    public function render()
    {
        return view('livewire.datosafiliator');
    }
}
