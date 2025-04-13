<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
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
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
    </style>
</head>
<body>
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