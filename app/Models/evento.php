<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'Eventos'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_eventos'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'nombre_eventos',
        'descripcion_eventos',
        'lugar_eventos',
        'fecha_eventos',
        'hora_eventos'
    ];
}
