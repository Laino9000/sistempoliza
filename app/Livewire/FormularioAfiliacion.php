<?php
namespace App\Livewire; 
use Livewire\Component;

class FormularioAfiliacion extends Component
{
    // Estas son las propiedades que se vinculan al formulario
    public $nombre = '';
    public $apellido = '';


    public function getIsValidProperty()
    {   

    

        return !empty($this->nombre) && !empty($this->apellido);
    }
    
   
    public function siguiente()
    {
     
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
        ]);
        
        
        session(['nombre_titular' => $this->nombre]);
        session(['apellido_titular' => $this->apellido]);
        
   
        return redirect()->to('/afilitation/numero-afiliacion');
    }
    
    public function render()
    {
        return view('livewire.formulario-afiliacion');
    }
}