<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Producto</title>
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
        .product-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .product-details {
            margin-top: 20px;
        }
        .product-details h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .product-details p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .product-details .price {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
        }
        .product-details .stock {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }
        .product-details form {
            margin-top: 20px;
        }
        .product-details input[type="number"] {
            width: 100px;
            padding: 5px;
            margin-right: 10px;
        }
        .product-details button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .product-details button:hover {
            background-color: #0056b3;
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