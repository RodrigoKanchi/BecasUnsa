<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login Becas Admin</title>
</head>
<style>
    .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<body>
    <div class="container">
    <form action="{{ route('login') }}" method="POST" class="">
        @csrf
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <input id="login-usuario" type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña:</label>
            <input id="login-password" type="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
    </form>

    </div>
    
</body>
</html>