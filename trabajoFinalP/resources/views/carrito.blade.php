<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
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
        .button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .form-inline {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .form-inline input[type="number"] {
            width: 60px;
            padding: 5px;
            text-align: center;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
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
    <form action="{{ route('ventas.generarRecibo') }}" method="POST">
        @csrf
        <div>
            <label for="nombre_cliente">Nombre:</label>
            <input type="text" id="nombre_cliente" name="nombre_cliente" required>
        </div>
        <div>
            <label for="apellido_cliente">Apellido:</label>
            <input type="text" id="apellido_cliente" name="apellido_cliente" required>
        </div>
        <div>
            <label for="direccion_cliente">Dirección:</label>
            <input type="text" id="direccion_cliente" name="direccion_cliente" required>
        </div>
        <div>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="button">Generar Recibo PDF</button>
    </form>
    <div class="container">
        <div class="title">Carrito de Compras</div>
        @if (session('carrito') && count(session('carrito')) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach (session('carrito') as $id => $producto)
                @php $subtotal = $producto['precio'] * $producto['cantidad']; @endphp
                @php $total += $subtotal; @endphp
                <tr>
                    <td>{{ $producto['nombre'] }}</td>
                    <td>${{ number_format($producto['precio'], 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.modificar', $id) }}" method="POST" class="form-inline">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="{{ $producto['cantidad'] }}" min="1" required>
                            <button type="submit" class="button">Actualizar</button>
                        </form>
                    </td>
                    <td>${{ number_format($subtotal, 2) }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button" style="background-color: #dc3545;">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="text-align: right; font-size: 18px; font-weight: bold; margin-bottom: 20px;">
            Total a Pagar: ${{ number_format($total, 2) }}
        </div>
        <div style="text-align: center;">
            <button class="button" onclick="window.location.href='{{ route('index') }}'">Seguir Comprando</button>
        </div>
        @else
        <p style="text-align: center;">El carrito está vacío.</p>
        <div style="text-align: center;">
            <button class="button" onclick="window.location.href='{{ route('index') }}'">Volver al Inicio</button>
        </div>
        @endif
    </div>
</body>
</html>