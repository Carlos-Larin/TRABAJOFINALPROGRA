
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/estiloLogin.css') }}">
    <div class="body">
        <div class="login-container">
            <h1>Registro de Usuario</h1>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" name="name" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit">Registrarse</button>
            </form>
            <a href="{{ route('login') }}"><button type="button">Iniciar Sesión</button></a>
        </div>
    </div>
</body>
</html>