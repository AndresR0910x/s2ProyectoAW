<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BolsaEmpleo extends Model
{
    use HasFactory;

    protected $table = 'Bolsa_de_Empleos'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_bE'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'id_empleo',
    ];

    // Define las relaciones si es necesario
    // Por ejemplo, si tienes una relación con la tabla Empleos, puedes hacer lo siguiente:
    public function empleo()
    {
        return $this->belongsTo(Empleo::class, 'id_empleo', 'id_empleo');
    }
}

