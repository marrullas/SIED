<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//ayuda es una tabla que contiene los tipos de ayuda que recibe una persona
class Ayuda extends Model
{
    use HasFactory;
    public $timestamps = false;
}
