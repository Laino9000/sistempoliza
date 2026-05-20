<?php

namespace App\Livewire;

use Livewire\Component;

use function Symfony\Component\String\s;

class Numeroafiliacion extends Component
{
    public $numero;

    public function getIsValidProperty()
    {
        return !empty($this->numero)
            && is_numeric($this->numero)
            && str_starts_with((string)$this->numero, '4')
            && (strlen($this->numero) <= 13) && (strlen($this->numero) >= 10);
    }

    public function siguiente()
    {
        // Validar que los campos no estén vacíos
        $this->validate([
            'numero' => 'required|numeric',
        ]);

        // Aquí puedes guardar en sesión o base de datos
        session(['numero_titular' => $this->numero]);


        return redirect()->to('/siguiente-paso-2');
    }

     public function enviarCodigo()
    {
        
        session()->flash('message', 'Código enviado correctamente!');
        return redirect()->to('/afilitation/confirmarcodigo');
    }

    public function render()
    {
        return view('livewire.numeroafiliacion');
    }
}
