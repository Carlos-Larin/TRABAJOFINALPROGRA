<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VentasController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('productos', [productosController::class, 'index'])->name('productos.index');
Route::get('productos/create', [productosController::class, 'create'])->name('productos.create'); // Ruta para el formulario de creación
Route::post('productos', [productosController::class, 'store'])->name('productos.store');
Route::get('productos/{id}/edit', [productosController::class, 'edit'])->name('productos.edit');
Route::put('productos/{id}', [productosController::class, 'update'])->name('productos.update');
Route::delete('productos/{id}', [productosController::class, 'destroy'])->name('productos.destroy');
Route::get('productos/{id}', [productosController::class, 'show'])->name('productos.show');

// Ruta para la gestión de ventas
Route::get('/ventas', function () {
    return view('registroVentas');
})->name('ventas.index');
//controlador del index
Route::get('/', [IndexController::class, 'index'])->name('index');

//controlador del carro run run
Route::post('carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::get('carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
Route::put('carrito/modificar/{id}', [CarritoController::class, 'modificar'])->name('carrito.modificar');
Route::delete('carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

//controlador de ventas
Route::post('ventas', [VentasController::class, 'store'])->name('ventas.store');
Route::get('ventas', [VentasController::class, 'index'])->name('ventas.index');
Route::post('ventas/generar-recibo', [VentasController::class, 'generarRecibo'])->name('ventas.generarRecibo');
Route::delete('ventas/{id}', [VentasController::class, 'destroy'])->name('ventas.destroy');