<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atencion extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_hora_atencion' => 'datetime:d/m/Y H:i:s',
    ];

    protected $table = 'atenciones';

    protected $fillable = [
        'tipo_ayuda_id',
        'descripcion',
        'familia_id',
        'evento_id',
        'fecha_hora_atencion',
        'responsable_atencion',
        'cantidad',
        'entregado',
        'foto1',
        'foto2',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
    public function familia()
    {
        return $this->belongsTo(Familia::class);
    }
    public function tipoAyuda()
    {
        return $this->belongsTo(TipoAyuda::class);
    }


    protected function fechaHoraAtencion(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i'): '',
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i'): null,
        );
    }


}
