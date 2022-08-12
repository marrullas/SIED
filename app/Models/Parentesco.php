<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentesco extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'parentescos';
    protected $fillable = [        
        'nombre',
        'descripcion'
    ];
}
