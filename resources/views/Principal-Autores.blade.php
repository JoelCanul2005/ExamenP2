<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Autores</h1>
        <div class="mb-3">
            <a href="{{ route('autores.create') }}" class="btn btn-primary">Agregar Nuevo Autor</a>
            <br>
            <br>
            <a href="{{ route('libros.index') }}" class="btn btn-secondary">Lista de Libros</a>
            <br>
            <br>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($autores as $autor)
                    <tr>
                        <td>{{ $autor->nombre }}</td>
                        <td>{{ $autor->apellido }}</td>
                        <td>{{ $autor->fecha_nacimiento }}</td>
                        <td>
                            <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning">Actualizar</a>
                            <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
