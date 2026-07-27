<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/afilitation/nombre-apellido', function () {
    return view('afiliation.get-name-lastname');
});

Route::get('/afilitation/numero-afiliacion', function () {
    return view('afiliation.numero-afiliacion');
});

Route::get('/afilitation/confirmarcodigo', function () {
    return view('afiliation.confirmarcodigo');
});

Route::get('/afilitation/preguntasapersonas', function () {
    return view('afiliation.preguntasapersonas');
});


Route::get('/afilitation/pagos', function () {
    return view('afiliation.pagos');
});


Route::get('/afilitation/datosafiliator', function () {
    return view('afiliation.datosafiliator');
});

Route::get('/afilitation/confirmar-pagos', function () {
    return view('afiliation.confirmar-pagos');
});

Route::get('/afilitation/procesado', function () {
    return view('afiliation.procesado');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //rutas de opciones de pólizas
    Route::get('/polizas/index-Masivos', \App\Livewire\PolizasMasivas::class)->name('cargaMasiva');
    Route::get('/polizas/index-Unidades', \App\Livewire\PolizaUni::class)->name('cargaUnidades');
    
    // Panel
    Route::get('/dashboard/panel', \App\Livewire\Dashboard::class)->name('panel');
    Route::get('/panel/polizas', \App\Livewire\Polizas::class)->name('polizas');
    Route::get('/panel/Usuarios', \App\Livewire\User::class)->name('Usuarios');
    Route::get('/panel/Search', \App\Livewire\Search::class)->name('Search');
});
