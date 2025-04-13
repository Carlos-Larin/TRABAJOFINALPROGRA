<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\IndexController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('productos', [productosController::class, 'index'])->name('productos.index');
Route::get('productos/create', [productosController::class, 'create'])->name('productos.create'); // Ruta para el formulario de creación
Route::post('productos', [productosController::class, 'store'])->name('productos.store');
Route::get('productos/{id}/edit', [productosController::class, 'edit'])->name('productos.edit');
Route::put('productos/{id}', [productosController::class, 'update'])->name('productos.update');
Route::delete('productos/{id}', [productosController::class, 'destroy'])->name('productos.destroy');

// Ruta para la gestión de ventas
Route::get('/ventas', function () {
    return view('registroVentas');
})->name('ventas.index');

Route::get('/', [IndexController::class, 'index'])->name('index');