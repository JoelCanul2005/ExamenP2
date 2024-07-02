<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <p>Joel Arcangel Canul Chan.</p>
        <br>
        <a href="{{ route('libros.index') }}" class="btn btn-primary">Entrar A la Lista De Libros</a>
    </div>
</body>
</html>
