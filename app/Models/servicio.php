<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicios';
    protected $primaryKey = 'id_serv';
    public $timestamps = false;


    protected $fillable = [
        'nombre_serv',
        'id_curso',
    ];

    //Relacion con la tabla cursos
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
