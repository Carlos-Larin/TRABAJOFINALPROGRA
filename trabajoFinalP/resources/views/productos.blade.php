<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="{{ asset('css/productos_default.css') }}">
</head>
<body>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, #007bff, #323248);
            background-attachment: fixed;
            background-size: cover;
        }
        .header {
            text-align: left;
            margin-bottom: 20px;
        }
    </style>

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
    <div class="title">Gestión de Productos</div>

    <!-- Tabla de productos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->codigo_producto }}</td>
                <td>{{ $producto->nombre_producto }}</td>
                <td>{{ $producto->descripcion_producto }}</td>
                <td>${{ number_format($producto->precio_producto, 2) }}</td>
                <td>{{ $producto->stock_producto }}</td>
                <td>{{ $producto->categoria_producto }}</td>
                <td>
                    <img src="{{ asset('images/' . $producto->imagen_producto) }}" alt="Imagen" style="width: 50px; height: 50px;">
                </td>
                <td>
                    <button class="button" onclick="window.location.href='{{ route('productos.edit', $producto->id) }}'">Editar</button>
                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="button" style="background-color: #dc3545;" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón para ir al formulario de creación -->
    <div class="actions">
        <button class="button" onclick="window.location.href='{{ route('productos.create') }}'">Ingresar Producto</button>
    </div>
    <div class="index" style="text-align: center; margin-top: 20px;">
        <button class="button" onclick="window.location.href='{{ route('index') }}'">menu</button>
    </div>
</div>
</body>
</html>