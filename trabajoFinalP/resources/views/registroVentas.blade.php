<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegistroVentas</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #007bff, #323248);
            background-attachment: fixed;
            background-size: cover;
        }
        header {
                background-color: #007bff;
                color: white;
                padding: 10px 20px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            header .logo {
                font-size: 20px;
                font-weight: bold;
            }
            header .nav-buttons {
                display: flex;
                gap: 10px;
            }
            header .nav-buttons button {
                background-color: white;
                color: #007bff;
                border: none;
                padding: 8px 15px;
                font-size: 14px;
                border-radius: 5px;
                cursor: pointer;
            }
            header .nav-buttons button:hover {
                background-color: #0056b3;
                color: white;
            }
            .container {
                max-width: 1200px;
                margin: 20px auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            }
            .title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                text-align: center;
            }
            .table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            .table th, .table td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }
            .table th {
                background-color: #007bff;
                color: white;
            }
    </style>
</head>
<body>
    <header>
        <div class="logo">Tienda de electronica TRC</div>
        <div class="nav-buttons">
            <button onclick="window.location.href='{{ route('productos.index') }}'">Productos</button>
            <button onclick="window.location.href='{{ route('ventas.index') }}'">Ventas</button>
            <button onclick="window.location.href='{{ route('carrito.mostrar') }}'">Carrito</button>
            <button onclick="window.location.href='{{ route('index') }}'">Inicio</button>
        </div>
    </header>
    <div class="container">
        <div class="title">Registro de Ventas</div>
        @if ($ventas->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Código de Venta</th>
                    <th>Nombre del Cliente</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->codigo_venta }}</td>
                    <td>{{ $venta->nombre_cliente }} {{ $venta->apellido_cliente }}</td>
                    <td>{{ $venta->nombre_producto }}</td>
                    <td>{{ $venta->cantidad_producto }}</td>
                    <td>${{ number_format($venta->total_venta, 2) }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>
                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="text-align: center;">No hay ventas registradas.</p>
        @endif
    </div>
</body>
</html>