<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Agregar Nuevo Libro</h1>
        <form action="{{ route('libros.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" class="form-control" required>
                @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
            <label for="fecha_publicacion">Fecha de Publicación:</label>
            <input type="date" id="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" class="form-control" required>
            @error('fecha_publicacion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            </div>
            <div class="form-group">
                <label for="autor_id">Autor</label>
                <select name="autor_id" id="autor_id" class="form-control" required>
                    <option value="">Seleccionar Autor</option>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
                    @endforeach
                    <option value="nuevo">Crear Nuevo Autor</option>
                </select>
            </div>
            <div id="crearAutor" style="display: none;">
            <a href="{!! route('autores.create') !!}" class="btn btn-link">Crear Nuevo Autor</a>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Libro</button>
        </form>
    </div>
    <br>
    <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>

    <script>
        document.getElementById('autor_id').addEventListener('change', function() {
            var selectedValue = this.value;
            if (selectedValue === 'nuevo') {
                document.getElementById('crearAutor').style.display = 'block';
            } else {
                document.getElementById('crearAutor').style.display = 'none';
            }
        });
    </script>
</body>
</html>
