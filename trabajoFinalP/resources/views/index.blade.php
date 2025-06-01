<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Tienda</title>
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

        /* Encabezado */
        header {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: bold;
        }

        /* Botones de navegación */
        .nav-buttons button {
            background-color: white;
            color: #007bff;
            border: none;
            padding: 10px 15px;
            margin-left: 10px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .nav-buttons button:hover {
            background-color: #dceaff;
        }

        /* Contenedor de productos */
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 40px;
        }

        /* Tarjetas de producto */
        .product-card {
            background-color: white;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 260px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        /* Títulos y descripción */
        .product-card h3 {
            font-size: 1.2rem;
            margin: 10px 0;
            color: #333;
        }

        .product-card p {
            color: #666;
            margin-bottom: 10px;
        }

        /* Precio */
        .product-card .price {
            color: #007bff;
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        /* Botón de detalles */
        .product-card button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .product-card button:hover {
            background-color: #0056b3;
        }

    </style>

    <header>
        <div class="logo">Tienda de electronica TRC</div>
        <div class="nav-buttons">
            @if(Auth::check())
            <button onclick="window.location.href='{{ route('productos.index') }}'">Productos</button>
            @endif
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