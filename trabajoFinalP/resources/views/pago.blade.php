<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 89.5vh;
            background-color: skyblue;
        }

        .pago-container {
            background-color: aliceblue;
            text-align: center;
            padding: 15px;
            border-radius: 20px;
            box-shadow: 0 0 10px white;
            width: 350px;
        }

        .input-group {
            margin-bottom: 15px;
            display: flex;
        }

        .input-group input {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            width: 100%;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-group input::placeholder {
            color: gray;
        }

        .boton-pago {
            background-color: white;
            color: black;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            border: none;
            border-radius: 8px;
        }

        .boton-pago:hover {
            background-color: red;
            color: white;
            box-shadow: 0 0 10px red;
        }

        .boton-pago img {
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>

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
                    <button class="boton-pago" type="submit">
                        <img src="" height="20"> PAGAR
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>