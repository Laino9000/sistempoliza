<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Models\clientes;
use App\Models\payments;
use App\Models\policies;
use App\Models\currency;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class ConfirmarPagos extends Component
{
    use WithFileUploads;

    public $reference_number;
    public $amount;
    public $foto_pago;

    //variable para usar globalmente no llega del request
    public $monto;


    protected $rules = [
        'reference_number' => 'required|digits_between:6,8',
        'amount' => 'required|numeric|min:1',
        'foto_pago' => 'required|image|max:2048|mimes:jpg,jpeg,png',
    ];

    protected $messages = [
        'reference_number.required' => 'El campo de referencia es obligatorio',
        'reference_number.digits_between' => 'El campo de referencia debe tener entre 6 y 8 dígitos',
        'reference_number.min' => 'El campo de referencia debe tener al menos 6 dígitos',
        'reference_number.max' => 'El campo de referencia debe tener al maximo 8 dígitos',
        'amount.required' => 'El campo de monto es obligatorio',
        'amount.numeric' => 'El campo de monto debe ser numérico',
        'amount.digits_between' => 'El campo de monto debe tener entre 2 y 30 dígitos',
        'foto_pago.required' => 'El campo de soporte de pago es obligatorio',
        'foto_pago.image' => 'El archivo debe ser una imagen',
        'foto_pago.max' => 'La imagen no puede superar los 2MB',
        'foto_pago.mimes' => 'La imagen debe ser JPG, JPEG o PNG',
    ];


    public function render()
    {
        return view('livewire.confirmar-pagos');
    }

    public function confirmarPago()
    {

        $this->validate();

        $cliente = clientes::where('id', session('id_cliente'))->first();

        $edad = $cliente->age;
        $tasa = currency::where('currency', 'Dolar')->select('rate')->first();

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

        $poliza = policies::create([
            'user_id'  => 2,
            'client_id'  => session('id_cliente'),
            'total' => $this->monto,
            'currency' => 'Dolar',
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addMonths(1),
        ]);

        $pago = payments::create([
            'policy_id' => $poliza->id,
            'reference_number' => $this->reference_number,
            'amount' => $this->amount,
            'payment_method' => 'Transferencia Bancaria',
        ]);

        $nombrePersonalizado = 'pago_' . $pago->id . '.' . $this->foto_pago->getClientOriginalExtension();
        $this->foto_pago->storeAs('pagos', $nombrePersonalizado, 'public');

        $pago->update([
            'capture' => $nombrePersonalizado,
        ]);

        return redirect()->to('/afilitation/procesado');
    }
}
