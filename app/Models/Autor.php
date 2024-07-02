<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Libro; // Importa el modelo Libro
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'Autores';
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento'];
    public $timestamps = false;

    public function libros()
    {

        return $this->hasMany(Libro::class, 'autor_id');
    }
}

