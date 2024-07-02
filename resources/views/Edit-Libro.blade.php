<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Editar Libro</h1>
        <form action="{{ route('libros.update', $libro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ $libro->titulo }}" required>
                @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha_publicacion">Fecha de Publicación</label>
                <input type="date" name="fecha_publicacion" id="fecha_publicacion" class="form-control" value="{{ $libro->fecha_publicacion }}" required>
                @error('fecha_publicacion')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="autor_id">Autor</label>
                <select name="autor_id" id="autor_id" class="form-control" required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}" {{ $autor->id == $libro->autor_id ? 'selected' : '' }}>{{ $autor->nombre }} {{ $autor->apellido }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" value="{{ $libro->precio }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Libro</button>
        </form>
    </div>
    <br>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
</body>
</html>
