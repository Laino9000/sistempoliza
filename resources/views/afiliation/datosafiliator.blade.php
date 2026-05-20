{{-- resources/views/afiliation/numero-afiliacion.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datos del afiliado') }}
        </h2>
    </x-slot>

    <livewire:datosafiliator />
</x-app-layout>