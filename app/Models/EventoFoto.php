<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventoFoto extends Model
{
    use HasFactory;

    public $fillable = ['evento_id', 'url', 'descripcion'];


    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
