<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;

    protected $table = 'Nosotros'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_nosotros'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'mision_nosotros',
        'vision_nosotros',
        'valores_nosotros',
        'historia_nosotros',
        'id_eL',
    ];

    // Define las relaciones si es necesario
    // Por ejemplo, si tienes una relación con la tabla Equipo_de_Liderazgo, puedes hacer lo siguiente:
    public function equipoLiderazgo()
    {
        return $this->belongsTo(EquipoLiderazgo::class, 'id_eL', 'id_eL');
    }
}
