<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    protected $table = 'empleos'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_empleo'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'nombre_empleo',
        'titulos_empleo',
        'experiencia_empleo',
        'vacantes',
        'id_hE'
    ];

    // Define las relaciones si es necesario
    // Por ejemplo, si tienes una relación con la tabla Horarios_Empleos, puedes hacer lo siguiente:
    public function horarioEmpleo()
    {
        return $this->belongsTo(HorarioEmpleo::class, 'id_hE', 'id_hE');
    }
}
