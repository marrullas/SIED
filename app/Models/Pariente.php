<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pariente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_documento_id',
        'documento',
        'edad',
        'genero_id',
        'telefono',
        'familia_id',
        'tipo_poblacion_id',
        'parentesco_id',
        'evento_id',
        'etnia_id',
        'notas'
    ];

    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class);
    }
    public function tipoPoblacion()
    {
        return $this->belongsTo(TipoPoblacion::class);
    }
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }
    public function parentesco()
    {
        return $this->belongsTo(Parentesco::class);
    }
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

}
