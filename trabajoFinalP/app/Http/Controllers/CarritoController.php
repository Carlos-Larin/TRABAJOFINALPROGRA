<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito', compact('carrito'));
    }
    public function agregar(Request $request, $id)
    {
        $producto = \App\Models\Producto::findOrFail($id);
        if ($producto->stock_producto < $request->cantidad) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible.');
        }
        $producto->stock_producto -= $request->cantidad;
        $producto->save();
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $request->cantidad;
        } else {
            $carrito[$id] = [
                'nombre' => $producto->nombre_producto,
                'precio' => $producto->precio_producto,
                'cantidad' => $request->cantidad,
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function modificar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] = $request->cantidad;
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Cantidad actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito.');
    }
}
