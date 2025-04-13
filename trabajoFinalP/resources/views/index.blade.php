<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - Tienda</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
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
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 20px auto;
        }
        .product-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 15px;
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .product-card h3 {
            font-size: 18px;
            margin: 10px 0;
        }
        .product-card p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }
        .product-card .price {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin: 10px 0;
        }
        .product-card button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .product-card button:hover {
            background-color: #0056b3;
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