<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
</head>
<body>
    <div class="container">
        <h1>Resultados de Búsqueda</h1>
        <a href="{{ url('/buscare') }}">Volver a Buscar</a>
        @if ($libros)
            <ul>
                @foreach ($libros as $libro)
                    <li>{{ $libro->titulo }} - {{ $libro->autor_nombre }} {{ $libro->autor_apellido }}</li>
                @endforeach
            </ul>
        @else
            <p>No se encontraron resultados.</p>
        @endif
    </div>
    <br>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Lista de Libros</a>
</body>
</html>
