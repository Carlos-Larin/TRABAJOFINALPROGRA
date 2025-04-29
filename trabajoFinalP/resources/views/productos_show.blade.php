<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="{{ asset('css/productos_show.css') }}">
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
        <img src="{{ $producto->imagen_producto }}" alt="{{ $producto->nombre_producto }}" class="product-image">
        <div class="product-details">
            <h1>{{ $producto->nombre_producto }}</h1>
            <p>{{ $producto->descripcion_producto }}</p>
            <div class="price">Precio: ${{ number_format($producto->precio_producto, 2) }}</div>
            <div class="stock">Cantidad en stock: {{ $producto->stock_producto }}</div>
            <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                @csrf
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" min="1" max="{{ $producto->stock_producto }}" required>
                <button type="submit">Agregar al Carrito</button>
            </form>
        </div>
    </div>
</body>
</html>