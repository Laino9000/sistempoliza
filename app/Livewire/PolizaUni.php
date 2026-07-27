<?php

namespace App\Livewire;

use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use App\Models\policies;
use App\Models\clientes;
use App\Models\currency;
use Illuminate\Support\Facades\Storage;

class PolizaUni extends Component
{
    public function render()
    {
        return view('livewire.poliza.poliza-uni');
    }
}
