<?php

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Rutas de clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    // Rutas de paquetes
    Route::get('/paquetes', [PaqueteController::class, 'index'])->name('paquetes.index');
    Route::post('/paquetes', [PaqueteController::class, 'store'])->name('paquetes.store');
    Route::get('/paquetes/create', [PaqueteController::class, 'create'])->name('paquetes.create');
    Route::delete('/paquetes/{paquete}', [PaqueteController::class, 'destroy'])->name('paquetes.destroy');
    Route::put('/paquetes/{paquete}', [PaqueteController::class, 'update'])->name('paquetes.update');
    Route::get('/paquetes/{paquete}/edit', [PaqueteController::class, 'edit'])->name('paquetes.edit');
    // Rutas de reservas
    Route::get('/reservas', [ReservaController::class, 'index'])->name('reservas.index');
    Route::post('/reservas', [ReservaController::class, 'store'])->name('reservas.store');
    Route::get('/reservas/create', [ReservaController::class, 'create'])->name('reservas.create');
    Route::delete('/reservas/{reserva}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
    Route::put('/reservas/{reserva}', [ReservaController::class, 'update'])->name('reservas.update');
    Route::get('/reservas/{reserva}/edit', [ReservaController::class, 'edit'])->name('reservas.edit');
});

require __DIR__ . '/auth.php';
