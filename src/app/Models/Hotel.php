<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    // Definir el nombre de la tabla
    protected $table = 'hoteles';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre',
        'direccion',
        'nit',
        'telefono',
        'email',
        'cantidad',
        'ciudad'
    ];

    public $timestamps = true;

    public function hotelTipoHabitacionAcomodacion()
    {
        return $this->hasMany(HotelTipoHabitacionAcomodacion::class, 'hotel_id', 'id');
    }



}
