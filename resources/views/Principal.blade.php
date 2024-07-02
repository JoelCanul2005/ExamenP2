<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Libros</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
@endif
    <div class="container">
        <h1>Lista de Libros</h1>
        <div class="mb-3">
            <a href="{{ route('libros.create') }}" class="btn btn-primary">Agregar Nuevo Libro</a>
            <br>
            <br>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Lista de Autores</a>
            <br>
            <br>
            <a href="{{ url('/buscare') }}" class="btn btn-secondary">Buscar Por titulo o Nombre de autor</a>
            <br>
            <br>
        </div>
            </div>
        </form>
        @if(isset($libros) && count($libros) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Fecha de Publicación</th>
                        <th>Autor</th>
                        <th>Precio</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($libros as $libro)
                        <tr>
                            <td>{{ $libro->titulo }}</td>
                            <td>{{ $libro->fecha_publicacion }}</td>
                            <td>{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</td>
                            <td>{{ $libro->precio }}</td>
                            <td>
                                <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Actualizar</a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron libros que coincidan con la búsqueda.</p>
        @endif
    </div>
</body>
</html>
