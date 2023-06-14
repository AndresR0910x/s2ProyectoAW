<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioCurso extends Model
{
    use HasFactory;

    protected $table = 'horarios_cursos'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_hC'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'dia_hE',
        'mes_hE',
        'horaInicio_hE',
        'horaFinalizacion_hE',
        'totalHoras_hC'
    ];

    // Define las relaciones si es necesario
    // Por ejemplo, si tienes una relación con la tabla Cursos, puedes hacer lo siguiente:
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso', 'id_curso');
    }
}
