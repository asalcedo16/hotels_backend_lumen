<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoHabitacionAcomodacion extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'tipo_habitacion_acomodacion';



    public $timestamps = true;

    public function tipoHabitacion()
    {
        return $this->belongsTo(TipoHabitacion::class, 'tipo_habitacion_id','id');
    }


    public function acomodacion()
    {
        return $this->belongsTo(Acomodacion::class, 'acomodacion_id', 'id');
    }




}
