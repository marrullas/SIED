<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etnia extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function familias()
    {
        return $this->hasMany(Familia::class);
    }
    public function parientes()
    {
        return $this->hasMany(Pariente::class);
    }
}
