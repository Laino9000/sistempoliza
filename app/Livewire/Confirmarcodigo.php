<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Hash;

class Confirmarcodigo extends Component
{
    public $codigo = ['', '', '', ''];
    public $timeLeft = 60;
    public $reenviarHabilitado = false;

    public function mount()
    {
        $this->startTimer();
    }

    public function startTimer()
    {
        $this->timeLeft = 60;
        $this->reenviarHabilitado = false;
    }

    public function reenviarCodigo()
    {
        if (!$this->reenviarHabilitado) return;

        session()->flash('message', 'Código reenviado correctamente!');

        $this->startTimer();
    }

    public function validarCodigo()
    {
        $codigo_completo = implode('', $this->codigo);


        if ($codigo_completo === '1234') {
            session()->flash('success', 'Código correcto!');

            $user = User::create([
                'name' => session('nombre_titular') . ' ' . session('apellido_titular'),
                'number' => session('numero_titular'),
                'role' => 2,
                'password' => Hash::make('123456')
            ]);


            return redirect()->to('/afilitation/datosafiliator');
        } else {
            session()->flash('error', 'Código incorrecto!');
        }


        $this->codigo = ['', '', '', ''];
    }

    public function render()
    {
        return view('livewire.confirmarcodigo');
    }
}
