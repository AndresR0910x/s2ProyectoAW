<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos'; // Nombre de la tabla

    protected $primaryKey = 'id_curso'; // Nombre de la columna de la clave primaria


    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo
    protected $fillable = [
        'nombre_curso',
        'duracion_curso',
        'instructor_curso',
        'descripcion_curso',
        'id_hC'
    ];

    public function horarioCurso()
    {
        return $this->belongsTo(HorarioCurso::class, 'id_hC');
    }
}
