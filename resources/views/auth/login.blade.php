<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - UPTAG</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

  <div class="card shadow p-4" style="width: 350px;">
    <h4 class="text-center text-primary mb-3">Contorl de Asistencia</h4>

    @if ($errors->any())
      <div class="alert alert-danger py-2">{{ $errors->first() }}</div>
    @endif

    <form action="{{ url('/login') }}" method="POST">
      @csrf
      <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="Correo institucional" required>
      </div>
      <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
      </div>
      <button class="btn btn-primary w-100">Entrar</button>
    </form>
  </div>

</body>
</html>
