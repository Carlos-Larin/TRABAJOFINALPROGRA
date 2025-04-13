<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
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
        .button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">Gestión de Productos</div>

        <!-- Botones de acción -->
        <div>
            <button class="button" onclick="window.location.href='{{ route('productos.create') }}'">Agregar Producto</button>
        </div>

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
    </div>
</body>
</html>