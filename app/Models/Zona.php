<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'estrato_id',
        'rural'
    ];

    public function estrato()
    {
        return $this->belongsTo(Estrato::class);
    }
}
