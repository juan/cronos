<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//******************* Register Forms
//******************* Number in Menu (1)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group( function () {
    Route::get('rempleado', App\Http\Livewire\Registro\Empleado::class)->name('rempleado');
    Route::get('listuser', App\Http\Livewire\Registro\ListaEmpleado::class)->name('listuser');
    Route::get('resector', App\Http\Livewire\Registro\Sectorregistro::class)->name('resector');
    Route::get('recargo', App\Http\Livewire\Registro\Graderegistro::class)->name('recargo');
    Route::get('editempleado/{id}', App\Http\Livewire\Registro\EmpleadoEdit::class)->name('editempleado');
});
//*******************End Register Forms

//******************* Pulicacions Forms
//******************* Number in Menu (2)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group( function () {
    Route::get('rearchipublic',\App\Http\Livewire\Publicacion\GestionPublic::class)->name('rearchipublic');
    
});
//******************* End Pulicacions Forms

//******************* Settings Forms
//******************* Number in Menu (3)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group( function () {
    Route::get('recompany',App\Http\Livewire\Settings\Createcompany::class)->name('recompany');
});
//*******************End Settings Forms