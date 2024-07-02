<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Libro;
use App\Models\Autor;
use Illuminate\Support\Facades\Session;

class LibrosController extends Controller
{
    // Mostrar la vista principal de libros
    public function index()
    {
        $libros = Libro::with('autor')->get();
        return view('Principal', compact('libros'));
    }

    // Mostrar la vista para crear un nuevo libro
    public function create()
    {
        $autores = Autor::all();
        return view('Crear-Libro', compact('autores'));
    }

    // Crear libro
    public function store(Request $request)
{
    // Validar los datos de entrada
    $request->validate([
        'titulo' => 'required|string|max:255|unique:libros',
        'fecha_publicacion' => 'required|date_format:Y-m-d',
        'autor_id' => 'required|exists:autores,id',
        'precio' => 'required|numeric',
    ], [
        'titulo.unique' => 'Ya existe un libro con este título.',
        'fecha_publicacion.date_format' => 'La fecha de publicación debe estar en el formato YYYY-MM-DD.',
    ]);

    // Crear el libro si la validación pasa
    Libro::create([
        'titulo' => $request->titulo,
        'fecha_publicacion' => $request->fecha_publicacion,
        'autor_id' => $request->autor_id,
        'precio' => $request->precio,
    ]);

    // Mensaje de éxito usando sesiones flash
    Session::flash('success', 'Libro creado exitosamente');

    return redirect()->route('libros.index');
}

    // Mostrar un libro específico
    public function show($id)
    {
        $libro = Libro::with('autor')->findOrFail($id);
        return view('libros.show', compact('libro'));
    }

    // Mostrar la vista para editar un libro
    public function edit($id)
    {
        $libro = Libro::findOrFail($id);
        $autores = Autor::all();
        return view('Edit-Libro', compact('libro', 'autores'));
    }

    // Actualizar un libro 
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date_format:Y-m-d',
            'autor_id' => 'required|exists:autores,id',
            'precio' => 'required|numeric',
        ], [
            'fecha_publicacion.date_format' => 'La fecha de publicación debe estar en el formato YYYY-MM-DD.',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update([
            'titulo' => $request->titulo,
            'fecha_publicacion' => $request->fecha_publicacion,
            'autor_id' => $request->autor_id,
            'precio' => $request->precio,
        ]);

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    // Eliminar un libro 
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
