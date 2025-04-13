<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }

    public function create()
    {
        return view('productos_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_producto' => 'required|unique:tabla_productos|max:50',
            'nombre_producto' => 'required|max:100',
            'descripcion_producto' => 'required|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'stock_producto' => 'required|integer|min:0',
            'categoria_producto' => 'required|max:50',
            'imagen_producto' => 'required|max:255',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto agregado correctamente.');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('productos_edit', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo_producto' => 'required|max:50',
            'nombre_producto' => 'required|max:100',
            'descripcion_producto' => 'required|max:255',
            'precio_producto' => 'required|numeric|min:0',
            'stock_producto' => 'required|integer|min:0',
            'categoria_producto' => 'required|max:50',
            'imagen_producto' => 'required|max:255',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}