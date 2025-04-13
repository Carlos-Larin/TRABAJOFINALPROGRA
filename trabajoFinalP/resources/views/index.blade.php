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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .menu-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .menu-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .menu-options {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .menu-option {
            text-align: right;
            width: 150px;
        }
        .menu-option img {
            width: 128px;
            height: 128px;
            margin-bottom: 10px;
        }
        .menu-option button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .menu-option button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="menu-title">Menú Principal</div>
        <div class="menu-options">
            <div class="menu-option">
                <img src="{{ asset('images/registrarProducto128.png') }}" alt="Registrar Producto">
                <button onclick="window.location.href='{{ route('productos.create') }}'">Registrar Producto</button>
            </div>
            <div class="menu-option">
                <img src="{{ asset('images/verVentas128.png') }}" alt="Ver Ventas">
                <button onclick="window.location.href='{{ route('ventas.index') }}'">Ver Ventas</button>
            </div>
        </div>
    </div>
</body>
</html>