<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Libros</title>
</head>
<body>
    <div class="container">
        <h1>Buscar Libros</h1>
        <h3>Puedes Ingresar solo un dato de estos</h3>
        <p>1. Titulo del libro</p>
        <p>2. Nombre de Autor</p>
        <p>3. Apellido de Autor</p>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/buscar') }}" method="POST">
            @csrf
            <input type="text" name="query" placeholder="Buscar por título o autor" required>
            <button type="submit">Buscar</button>
        </form>
    </div>
    <br>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Lista de Libros</a>
</body>
</html>
