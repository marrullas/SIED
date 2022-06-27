<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_hora_verificacion' => 'datetime:d/m/Y H:i:s',
        'fecha_hora_evento' => 'datetime:d/m/Y H:i:s',
        'fecha_hora_reporte' => 'datetime:d/m/Y H:i:s',
    ];

    //protected $dateFormat = 'Y-m-d H:i:s';
    protected $fillable = [
        'fecha_hora_reporte',
        'responsable_reporte',
        'fecha_hora_verificacion',
        'responsable_verificacion',
        'fecha_hora_evento',
        'descripcion',
        'tipo_evento_id',
        'estado_evento_id',
        'zona_id',
        'direccion',
        'numero_afectados',
        'entidad_id',
    ];

    public function eventoFotos()
    {
        return $this->hasMany(EventoFoto::class);
    }

    public function tipoEvento()
    {
        return $this->belongsTo(TipoEvento::class);
    }
    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
    public function estadoEvento()
    {
        return $this->belongsTo(EstadoEvento::class);
    }
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);
    }


//      public function getFechaHoraReporteAttribute($value)
//      {
//         if($value != null)
//          return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
//     }
//     public function getFechaHoraVerificacionAttribute($value)
//     {
//         if($value != null)
//         return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
//     }

//     public function getFechaHoraEventoAttribute($value)
//     {
//         if($value != null)
//         return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i');
//     }

//     public function setFechaHoraEventoAttribute($value)
//     {
//         //if($value != null)
//         return Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i');
//     }

//     public function setFechaHoraReporteAttribute($value)
//     {
//        //if($value != null)
//         return Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i');
//    }
//    public function setFechaHoraVerificacionAttribute($value)
//    {
//        //if($value != null)
//        return Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i');
//    }


    
    protected function fechaHoraReporte(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i'): '',
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i'): null,
        );
    }

    protected function fechaHoraVerificacion(): Attribute
        {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i'): '',
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i'): null,
        );
    }

    Protected function fechaHoraEvento(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i'): '',
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i'): null,
        );
    }
}
