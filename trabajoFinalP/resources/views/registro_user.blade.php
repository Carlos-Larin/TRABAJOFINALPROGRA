<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        .body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 95vh;
            background-color: skyblue;
        }

        .register-container{
            background-color: aliceblue;
            text-align: center;
            padding: 15px;
            border-radius: 20px;
            box-shadow: 0 0 10px black;
            width: 300px;
        }

        .input-group{
            margin-bottom: 15px;
        }

        .input-group input{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            width: 100%;
            font-size: 16px;
            box-sizing: border-box;
        }

        .input-group input::placeholder{
            color: gray;
        }

        button{
            background-color: white;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            color: black;
            width: 100px;
            height: 30px;
            border-radius: 20px;
            border: 2px solid black;
            cursor: pointer;
            display: inline-block;
        }

        button:hover{
            background-color: skyblue;
        }
    </style>

    <div class="body">
        <div class="register-container">
            <h1>Registro</h1>
            <form action="" method="POST">
                <div class="input-group">
                    <input type="text" name="nombre" placeholder="Nombre Completo" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>