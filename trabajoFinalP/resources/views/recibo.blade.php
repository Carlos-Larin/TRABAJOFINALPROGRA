<!DOCTYPE html>
<html lang="en">
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
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 5px 0;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Recibo de Compra</h1>
        <p>Tienda de Electrónica TRC</p>
    </div>
    <div class="details">
        <p><strong>Cliente:</strong> {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}</p>
        <p><strong>Dirección:</strong> {{ $cliente['direccion'] }}</p>
        <p><strong>Fecha:</strong> {{ now()->format('d/m/Y') }}</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carrito as $producto)
            <tr>
                <td>{{ $producto['nombre'] }}</td>
                <td>${{ number_format($producto['precio'], 2) }}</td>
                <td>{{ $producto['cantidad'] }}</td>
                <td>${{ number_format($producto['precio'] * $producto['cantidad'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="total">
        Total a Pagar: ${{ number_format($total, 2) }}
    </div>
</body>
</html>