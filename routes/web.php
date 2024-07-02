<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\AutorController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('libros', LibrosController::class);

use App\Http\Controllers\LibroController;

Route::get('/buscare', [LibroController::class, 'showSearchForm']);
Route::post('/buscar', [LibroController::class, 'search']);

Route::resource('autores', AutorController::class);

