<?php

use Illuminate\Support\Facades\Route;
$registo = '';
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group( function () {
    Route::get('rempleado', App\Http\Livewire\Registro\Empleado::class)->name('rempleado');
    Route::get('sector', App\Http\Livewire\Registro\Sectorregistro::class)->name('sector');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group( function () {
    Route::get('userprofile',App\Http\Livewire\Settings\Profile::class)->name('userprofile');
    Route::get('createcompany',App\Http\Livewire\Settings\Createcompany::class)->name('createcompany');
});