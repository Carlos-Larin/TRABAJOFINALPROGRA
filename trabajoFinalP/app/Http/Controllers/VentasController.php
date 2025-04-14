<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use App\Mail\ReciboMailable;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = \App\Models\Venta::all();
        return view('registroVentas', compact('ventas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'apellido_cliente' => 'required|string|max:100',
            'direccion_cliente' => 'required|string|max:255',
        ]);

        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        foreach ($carrito as $id => $producto) {
            Venta::create([
                'codigo_venta' => 'VENTA-' . uniqid(),
                'nombre_cliente' => $request->nombre_cliente,
                'apellido_cliente' => $request->apellido_cliente,
                'direccion_cliente' => $request->direccion_cliente,
                'id_producto' => $id,
                'nombre_producto' => $producto['nombre'],
                'cantidad_producto' => $producto['cantidad'],
                'total_venta' => $producto['precio'] * $producto['cantidad'],
                'fecha_venta' => now(),
            ]);

            $productoDB = Producto::findOrFail($id);
            $productoDB->stock_producto -= $producto['cantidad'];
            $productoDB->save();
        }

        // Limpiar el carrito después de registrar la venta
        session()->forget('carrito');

        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }
    public function generarRecibo(Request $request)
    {
        // Validar los datos del cliente
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'apellido_cliente' => 'required|string|max:100',
            'direccion_cliente' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);

        if (empty($carrito)) {
            return redirect()->back()->with('error', 'El carrito está vacío.');
        }

        // Datos del cliente
        $cliente = [
            'nombre' => $request->nombre_cliente,
            'apellido' => $request->apellido_cliente,
            'direccion' => $request->direccion_cliente,
        ];

        // Calcular el total
        $total = 0;
        foreach ($carrito as $producto) {
            $total += $producto['precio'] * $producto['cantidad'];
        }

        // Generar el PDF
        $pdf = Pdf::loadView('recibo', compact('carrito', 'cliente', 'total'))->output();

        // Enviar el correo con el recibo adjunto
        Mail::to($request->email)->send(new ReciboMailable($cliente, $carrito, $total, $pdf));

        return redirect()->route('ventas.index')->with('success', 'Recibo enviado por correo exitosamente.');
    }
    public function destroy($id)
    {
        $venta = \App\Models\Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
