<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Tienda</title>
    <link rel="stylesheet" href="{{ asset('css/estiloPagina.css') }}">
</head>
<body>
    <header>
        <div class="logo">Tienda de electronica TRC</div>
        <div class="nav-buttons">
            <button onclick="window.location.href='{{ route('productos.index') }}'">Productos</button>
            <button onclick="window.location.href='{{ route('ventas.index') }}'">Ventas</button>
            @if(Auth::check())
            <button onclick="window.location.href='{{ route('carrito.mostrar') }}'">Carrito</button>
            @endif
            <button onclick="window.location.href='{{ route('login') }}'">Iniciar Sesion</button>
            @if(Auth::check())
                <button onclick="window.location.href='{{ route('logout') }}'">Cerrar Sesión</button>
            @endif

            <button onclick="window.location.href='{{ route('index') }}'">Inicio</button>
        </div>
    </header>

    <div class="product-grid">
        @foreach ($productos as $producto)
        <div class="product-card">
            <img src="{{ $producto->imagen_producto }}" alt="{{ $producto->nombre_producto }}">
            <h3>{{ $producto->nombre_producto }}</h3>
            <p>{{ $producto->descripcion_producto }}</p>
            <div class="price">${{ number_format($producto->precio_producto, 2) }}</div>
            <button onclick="window.location.href='{{ route('productos.show', $producto->id) }}'">Ver Detalles</button>
        </div>
        @endforeach
    </div>
</body>
</html>