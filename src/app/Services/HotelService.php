<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class HotelService
{
    // Función para validar y crear un hotel
    public function createHotel($data)
    {
         // Definir los mensajes de error personalizados
        $messages = config('validaciones.hotel');

        // Validar los datos
        $validator = Validator::make($data, [
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'nit' => 'required|string|unique:hoteles,nit',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'cantidad' => 'required|integer|min:1',
            'ciudad' => 'required|string',
        ], $messages);

        // Si la validación falla, lanzar una excepción
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


        $hotel = Hotel::create($validator->validated());
        return $hotel->load('hotelTipoHabitacionAcomodacion.tipoHabitacionesAcomodaciones');
    }

    // Función para obtener todos los hoteles
    public function getAllHotels()
    {
        return Hotel::with(
            'hotelTipoHabitacionAcomodacion.tipoHabitacionesAcomodaciones'
            )
            ->get();
    }

    // Función para eliminar un hotel
    public function deleteHotel($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            $this->responseException('Hotel no encontrado.');
        }

        $hotel->delete();

        return 'Hotel eliminado exitosamente.';
    }


    public function updateHotel($id, $data)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            $this->responseException('Hotel no encontrado.');
        }

        $messages = config('validaciones.hotel');

        // Validación
        $validator = Validator::make($data, [
            'nombre' => 'string',
            'direccion' => 'string',
            'nit' => 'string|unique:hoteles,nit,' . $id,
            'telefono' => 'string',
            'email' => 'email',
            'cantidad' => 'integer|min:1',
            'ciudad' => 'string',
        ]);

        // Si la validación falla, lanzar una excepción
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


        $hotel->update($data);

        return $hotel;
    }

    private function responseException($message)
    {
       throw new HttpResponseException(
           response()->json(['error'=>$message], 400));
    }
}
