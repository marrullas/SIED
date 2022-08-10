<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPoblacion extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'tipo_poblaciones';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];
}
