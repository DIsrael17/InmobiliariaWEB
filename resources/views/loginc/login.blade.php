<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
 @vite(['resources/css/login.css', 'resources/js/app.js'])
</head>
<body>
  <div class="login-box">
      @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <h2>Iniciar Sesión</h2>
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <input type="text" name="email" placeholder="Correo electrónico" required>
      <input type="password" name="password" placeholder="Contraseña" required>
      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
</html>
