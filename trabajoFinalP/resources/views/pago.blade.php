<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pago</title>
    <link rel="stylesheet" href="{{ asset('css/pago.css') }}">
</head>
<body>
    <div class="body">
        <div class="pago-container">
            <h1>Pago</h1>
            <form method="POST" action="{% url 'pago' %}">
                <div class="input-group">
                    <input type="text" required placeholder="Nombre del titular">
                </div>
                <div class="input-group">
                    <input type="number" required placeholder="Número de tarjeta">
                </div>
                <div class="input-group">
                    <input type="number" required placeholder="MM/AA">
                    <input type="number" required placeholder="CVV">
                </div>
                <div>
                    <button class="boton-pago" type="submit">PAGAR</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>