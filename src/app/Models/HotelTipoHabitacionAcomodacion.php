<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelTipoHabitacionAcomodacion extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'hotel_tipo_habitacion_acomodacion';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'hotel_id',
        'tipo_habitacion_acomodacion_id',
        'cantidad'
    ];

    public $timestamps = true;

}
