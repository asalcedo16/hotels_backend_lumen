<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acomodacion extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'acomodaciones';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre'
    ];

    public $timestamps = true;



}
