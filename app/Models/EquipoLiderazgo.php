<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipoLiderazgo extends Model
{
    use HasFactory;

    protected $table = 'equipo_de_liderazgo'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_eL'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'nombre_eL',
        'cargo_eL',
        'experiencia_eL',
        'descripcion_eL'
    ];
}
