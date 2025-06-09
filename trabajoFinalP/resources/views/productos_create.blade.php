<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <!--<link rel="stylesheet" href="{{ asset('css/estiloPagina.css') }}">-->
        <style>
        body {
            background: #f4f6fa;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 400px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            padding: 32px 28px 24px 28px;
        }
        .title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 24px;
            text-align: center;
            color: #007bff;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
            color: #222;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
            font-size: 1rem;
            background: #f8fafc;
            transition: border 0.2s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border: 1.5px solid #007bff;
            outline: none;
        }
        textarea {
            resize: vertical;
        }
        .button {
            width: 100%;
            padding: 10px 0;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .button:hover {
            background: #0056b3;
        }
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
        .nav-buttons button {
            background-color: white;
            color: #007bff;
            border: none;
            border-radius: 6px;
            padding: 10px 15px;
            margin-left: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .nav-buttons button:hover {
            background: #e6f0ff;
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
        <div class="title">Agregar Producto</div>
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="codigo_producto">Código del Producto</label>
                <input type="text" id="codigo_producto" name="codigo_producto" required>
            </div>
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto</label>
                <input type="text" id="nombre_producto" name="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="descripcion_producto">Descripción</label>
                <textarea id="descripcion_producto" name="descripcion_producto" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="precio_producto">Precio</label>
                <input type="number" id="precio_producto" name="precio_producto" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock_producto">Stock</label>
                <input type="number" id="stock_producto" name="stock_producto" required>
            </div>
            <div class="form-group">
                <label for="categoria_producto">Categoría</label>
                <input type="text" id="categoria_producto" name="categoria_producto" required>
            </div>
            <div class="form-group">
                <label for="imagen_producto">Imagen (URL)</label>
                <input type="text" id="imagen_producto" name="imagen_producto" required>
            </div>
            <button type="submit" class="button">Guardar Producto</button>
        </form>
    </div>
</body>
</html>