<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: left;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .header p {
            margin: 2px 0;
            font-size: 10px;
        }
        .details {
            margin-bottom: 20px;
            font-size: 12px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
        }
        .details td {
            padding: 5px;
            border: 1px solid #ddd;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 12px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Encabezado -->
    <div class="header">
        <h1>Tienda Electrónica TRC</h1>
        <p>Dirección: Calle Principal #123</p>
        <p>Ciudad: Ciudad Ejemplo</p>
        <p>Teléfono: 555-123-4567</p>
    </div>

    <!-- Detalles de la factura -->
    <div class="details">
        <table>
            <tr>
                <td><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</td>
                <td><strong>Factura #:</strong> {{ uniqid('FAC-') }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Facturado a:</strong><br>
                    {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}<br>
                    <strong>Destino del paquete:</strong>{{ $cliente['direccion'] }}
                </td>
            </tr>
        </table>
    </div>

    <!-- Tabla de productos -->
    <table class="table">
        <thead>
            <tr>
                <th>Ítem</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $numero_item = 1; $total_vendido = 0; @endphp
            @foreach ($carrito as $producto)
                @php
                    $cantidad = $producto['cantidad'];
                    $precio_unitario = $producto['precio'];
                    $precio_total = $cantidad * $precio_unitario;
                    $total_vendido += $precio_total;
                @endphp
                <tr>
                    <td>{{ $numero_item++ }}</td>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>{{ number_format($cantidad, 2) }}</td>
                    <td>${{ number_format($precio_unitario, 2) }}</td>
                    <td>${{ number_format($precio_total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total -->
    <div class="total">
        <p>Total a Pagar: ${{ number_format($total_vendido, 2) }}</p>
    </div>
</body>
</html>