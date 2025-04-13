<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productosController;

Route::get('/', function () {
    return view('index');
});

Route::get('/productos', function () {
    return view('productos');
})->name('productos.create');

Route::get('/ventas', function () {
    return view('registroVentas');
})->name('ventas.index');

Route::resource('productos', productosController::class);