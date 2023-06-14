<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponsabilidadSocial extends Model
{
    use HasFactory;

    protected $table = 'Responsabilidad_Social';
    protected $primaryKey = 'id_rS';
    public $timestamps = false;

    protected $fillable = [
        'id_serv'
    ];

    // Relación con el modelo Servicio
    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_serv');
    }
}
