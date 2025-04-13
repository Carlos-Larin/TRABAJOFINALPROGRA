<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class IndexController extends Controller
{
    public function index()
    {
        // Obtener todos los productos de la base de datos
        $productos = Producto::all();

        // Pasar los productos a la vista del menú principal
        return view('index', compact('productos'));
    }
}