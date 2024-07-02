<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $table = 'Libros';

    protected $fillable = [
        'titulo',
        'fecha_publicacion',
        'autor_id',
        'precio',
    ];

    public $timestamps = false;

    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }
}
