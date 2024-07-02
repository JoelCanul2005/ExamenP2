<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    public function showSearchForm()
    {
        // Muestra Vista del buscador
        return view('Buscar-Libro');
    }

    public function search(Request $request)
    {
        // Validar y obtener la consulta de búsqueda del parámetro 'query'
        $request->validate([
            'query' => 'required|string',
        ]);

        $searchQuery = $request->input('query');

        // Llama al procedimiento
        try {
            $libros = DB::select('CALL buscar_libros(?)', [$searchQuery]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al realizar la búsqueda']);
        }

        return view('Busqueda_Res', ['libros' => $libros]);
    }
}

