<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\clientes;
use App\Models\Poliza;
use Illuminate\Support\Facades\Log;
use App\Models\currency;

class PagosPasarella extends Component
{
    public $metodoSeleccionado = null;


    public $nombre;
    public $identificacion;
    public $plan;
    public $monto;
    public $vigencia;

    public function mount()
    {
        $idCliente = session('id_cliente');

        if (!$idCliente) {
            return redirect()->to('/afilitation/datosafiliator');
        }


        $cliente = clientes::find($idCliente);


        if (!$cliente) {
            session()->forget('id_cliente');
            session()->flash('error', 'Cliente no encontrado');
            return redirect()->to('/afilitation/datosafiliator');
        }


        $this->nombre = $cliente->name . ' ' . $cliente->lastname;
        $this->identificacion = $cliente->identity;

        $this->plan = 'Salud Vital Gold';


        $edad = $cliente->age;
        $tasa = currency::where('currency', 'Dolar')->select('rate')->first();
        log::info($tasa->rate);

        if ($edad <= 50) {
            $pagar = 25 * $tasa->rate;
            $this->monto = number_format($pagar, 2, ',', '.');
        } elseif ($edad <= 70) {
            $pagar = 50 * $tasa->rate;
            $this->monto = number_format($pagar, 2, ',', '.');
        } elseif ($edad <= 85) {
            $pagar = 75 * $tasa->rate;
            $this->monto = number_format($pagar, 2, ',', '.');
        } elseif ($edad <= 120) {
            $pagar = 100 * $tasa->rate;
            $this->monto = number_format($pagar, 2, ',', '.');
        } else {

            $this->monto = number_format(0, 2, ',', '.');
            session()->flash('error', 'Edad fuera del rango permitido');
        }

        $this->vigencia = "1 Mes";
    }

    public function seleccionarMetodo($metodo)
    {
        $this->metodoSeleccionado = $metodo;
    }

    public function procesarPago()
    {
        if (!$this->metodoSeleccionado) {
            session()->flash('error', 'Por favor, selecciona un método de pago.');
            return;
        }

        session()->flash('mensaje', 'Método seleccionado: ' . $this->metodoSeleccionado);
        return redirect()->to('/afilitation/confirmar-pagos');
    }

    public function render()
    {
        return view('livewire.pagos-pasarella');
    }
}
