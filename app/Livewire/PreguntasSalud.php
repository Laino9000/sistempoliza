<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\clientes;
use App\Models\declarations;
use Illuminate\Support\Facades\Log;


class PreguntasSalud extends Component
{

    public $condiciones = [];
    public $ninguna = false;

    public function updatedNinguna($value)
    {
        if ($value) {
            $this->condiciones = [];
        }
    }

    public function updatedCondiciones()
    {
        if (!empty($this->condiciones)) {
            $this->ninguna = false;
        }
    }
    
    public function guardarSalud()
    {
        $cliente = Clientes::find(session('id_cliente'));


        $datos = [
            'has_hypertension' => in_array('tension', $this->condiciones),
            'has_diabetes' => in_array('diabetes', $this->condiciones),
            'has_heart_disease' => in_array('corazon', $this->condiciones),
            'has_none' => $this->ninguna
        ];

        if ($cliente->id_declarations) {
    
            $declarations = Declarations::find($cliente->id_declarations);
            $declarations->update($datos);
        } else {
            
            $declarations = Declarations::create($datos);
            $cliente->id_declarations = $declarations->id;
            $cliente->save();
        }

        return redirect()->to('/afilitation/pagos');
    }

    public function boot()
    {
        if (!session('id_cliente')) {
            return redirect()->to('/afilitation/datosafiliator');
        }
    }

    public function render()
    {
        return view('livewire.preguntas-salud');
    }
}
