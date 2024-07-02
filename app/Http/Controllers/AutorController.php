<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    // Mostrar la vista principal de autores
    public function index()
    {
        $autores = Autor::all();
        return view('Principal-Autores', compact('autores'));
    }

    // Mostrar la vista de crear un nuevo autor
    public function create()
    {
        return view('Crear-Autor');
    }

    //Crear nuevo autor 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
        ], [
            'fecha_nacimiento.date_format' => 'La fecha de publicación debe estar en el formato YYYY-MM-DD.',
        ]);

        Autor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect()->route('autores.index')->with('success', 'Autor creado exitosamente');
    }

    // Mostrar un autor específico
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.show', compact('autor'));
    }

    // Mostrar la vista para editar un autor
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('Edit-Autor', compact('autor'));
    }

    // Actualizar un autor
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date_format:Y-m-d',
        ], [
            'fecha_nacimiento.date_format' => 'La fecha de publicación debe estar en el formato YYYY-MM-DD.',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
        ]);

        return redirect()->route('autores.index')->with('success', 'Autor actualizado exitosamente');
    }

    // Eliminar un autor existente
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor eliminado exitosamente');
    }
}
