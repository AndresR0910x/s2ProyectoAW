<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'Contactenos'; // Especifica el nombre de la tabla en la base de datos

    protected $primaryKey = 'id_contac'; // Especifica el nombre de la columna de clave primaria

    public $timestamps = false; // Indica si el modelo tiene columnas de marca de tiempo

    protected $fillable = [
        'tel_contac',
        'email_contact',
        'direccion_contact',
    ];
}
