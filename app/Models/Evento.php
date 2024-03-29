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
        'fecha_hora_cierre' => 'datetime:d/m/Y H:i:s',
    ];

    protected $attributes = [
        'estado_evento_id' => 1,
        'estado_id' => 1,
        'atendido' => false,
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
        'estado_id',
        'direccion',
        //TODO: quitar numero afectados
        'numero_afectados',
        'entidad_id',
        'atendido',
        'fecha_hora_cierre',
        'descripcion_cierre',
        'entidad_nombre'
    ];

    public function eventoFotos()
    {
        return $this->hasMany(EventoFoto::class);
    }

    public function eventoFamilias()
    {
        return $this->hasMany(Familia::class);
    }

    public function eventoParientes()
    {
        return $this->hasMany(Pariente::class);
    }

    public function eventoAtenciones()
    {
        return $this->hasMany(Atencion::class);
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

    public function getNumeroFamiliasAttribute()
    {
        return $this->eventoFamilias()->count();
    }
    public function getNumeroAfectadosAttribute()
    {
        $numeroafectados =  $this->eventoFamilias()->count() + $this->eventoParientes()->count();

        return $numeroafectados;
    }
    public function getNumeroAtencionesAttribute()
    {
        return $this->eventoAtenciones()->count();
    }

    public function getTaeAttribute()
    {
        
        if($this->fecha_hora_verificacion != null){
            $start = Carbon::parse( Carbon::createFromFormat('d/m/Y H:i',$this->fecha_hora_reporte));
            $end = Carbon::parse( Carbon::createFromFormat('d/m/Y H:i',$this->fecha_hora_verificacion));
            $duration = $end->diffInHours($start);
        }else{
            $duration = 0;
        }
        
        

        return $duration;
      
    }

    public function getRangotaeAttribute()
    {

        $rango = 'Malo';
        if($this->tae < 72){
            $rango = 'Medio';
        }
        if($this->tae < 48){
            $rango = 'Bueno';
        }

        return $rango;
      
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

    Protected function setFechaHoraCierreAttribute($value)
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i'): '',
            set: fn ($value) => $value ? Carbon::createFromFormat('d/m/Y H:i', $value)->format('Y-m-d H:i'): null,
        );
    
    }
}
