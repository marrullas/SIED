<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento_id',
        'documento',
        'telefono',
        'direccion',
        'email',
        'numero_miembros',
        'mayores65',
        'mayores18',
        'menores18',
        'evento_id'
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    public function parientes()
    {
        return $this->hasMany(Pariente::class);
    }
}
