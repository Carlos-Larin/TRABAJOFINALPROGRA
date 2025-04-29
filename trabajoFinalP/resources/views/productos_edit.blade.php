<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="{{ asset('css/estiloPagina.css') }}">
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
        <div class="title">Editar Producto</div>
        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="codigo_producto">Código del Producto:</label>
                <input type="text" id="codigo_producto" name="codigo_producto" value="{{ $producto->codigo_producto }}" required>
            </div>
            <div class="form-group">
                <label for="nombre_producto">Nombre del Producto:</label>
                <input type="text" id="nombre_producto" name="nombre_producto" value="{{ $producto->nombre_producto }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion_producto">Descripción:</label>
                <textarea id="descripcion_producto" name="descripcion_producto" rows="3" required>{{ $producto->descripcion_producto }}</textarea>
            </div>
            <div class="form-group">
                <label for="precio_producto">Precio:</label>
                <input type="number" id="precio_producto" name="precio_producto" value="{{ $producto->precio_producto }}" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="stock_producto">Stock:</label>
                <input type="number" id="stock_producto" name="stock_producto" value="{{ $producto->stock_producto }}" required>
            </div>
            <div class="form-group">
                <label for="categoria_producto">Categoría:</label>
                <input type="text" id="categoria_producto" name="categoria_producto" value="{{ $producto->categoria_producto }}" required>
            </div>
            <div class="form-group">
                <label for="imagen_producto">Imagen (URL):</label>
                <input type="text" id="imagen_producto" name="imagen_producto" value="{{ $producto->imagen_producto }}" required>
            </div>
            <button type="submit" class="button">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>