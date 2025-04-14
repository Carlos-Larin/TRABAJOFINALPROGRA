<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recibo de Compra</title>
</head>
<body>
    <h1>Gracias por tu compra, {{ $cliente['nombre'] }} {{ $cliente['apellido'] }}!</h1>
    <p>Adjunto encontrarás el recibo de tu compra.</p>
    <p>Total a pagar: ${{ number_format($total, 2) }}</p>
    <p>¡Esperamos verte pronto!</p>
</body>
</html>