<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\policies;

class Polizas extends Component
{
    public $openMenuId = null;

    public function toggleMenu($id)
    {
        if ($this->openMenuId === $id) {
            $this->openMenuId = null; 
        } else {
            $this->openMenuId = $id;  
        }
    }

    public function render()
    {

        $polizas = policies::all();

        return view('livewire.polizas.polizas', compact('polizas'))->layout('dashboard');
    }
}
