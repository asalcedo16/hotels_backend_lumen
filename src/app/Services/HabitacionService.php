<?php

namespace App\Services;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

use App\Models\HotelTipoHabitacionAcomodacion as Habitacion;
use App\Models\HotelTipoHabitacion as TipoHabitacion;
use App\Models\Hotel;

class HabitacionService
{
     // Función para validar y crear un hotel
     public function createHabitacion($data)
     {
          // Definir los mensajes de error personalizados
         $messages = config('validaciones.habitacion');


         $validator = Validator::make($data, [
             'hotel_id' => 'required|integer',
             'tipo_habitacion_acomodacion_id' => 'required|integer',
             'cantidad' => 'required|integer|min:1',

         ], $messages);

         // Si la validación falla, lanzar una excepción
         if ($validator->fails()) {
             throw new ValidationException($validator);
         }

         // Verificar si ya existe una relación entre hotel_id y tipo_habitacion_id
        $existingHabitacion = Habitacion::where('hotel_id', $data['hotel_id'])
        ->where('tipo_habitacion_acomodacion_id', $data['tipo_habitacion_acomodacion_id'])
        ->first();

        if ($existingHabitacion) {
            $this->responseException('Ya existe una habitación de este tipo para este hotel.');
        }


        $this->statusCantidadHotel($data['hotel_id'],$data['cantidad']);

        return Habitacion::create($validator->validated());
     }


    //Determina si el hotel tiene aun tiene habitaciones para configurar.
    //Si no posee se despliega el error respectivo.
     private function statusCantidadHotel($hotel_id, $cantidad)
     {
        // Obtener el hotel para verificar la cantidad máxima de habitaciones
        $hotel = Hotel::find($hotel_id);

        if (!$hotel) {
            $this->responseException('Hotel no encontrado');
        }

        // Contar la cantidad de habitaciones ya registradas en el hotel
        $totalHabitaciones = Habitacion::where('hotel_id', $hotel_id)->sum('cantidad');

        // Verificar si la cantidad total de habitaciones no supera el límite
        if ($totalHabitaciones + $cantidad > $hotel->cantidad) {
            $this->responseException('La cantidad total de habitaciones supera el limite permitido para este hotel.');
        }
     }

     // Función para obtener todos los hoteles
     public function getAllHabitacion($hotel_id)
     {
         return Habitacion::where('hotel_id',$hotel_id)->get();
     }

     Public function getTipoHabitacion()
     {
        return TipoHabitacion::all();
     }

     // Función para eliminar un hotel
     public function deleteHabitacion($id)
     {
         $habitacion = Habitacion::find($id);

         if (!$habitacion) {
            $this->responseException('Habitacion no encontrada.');
         }

         $habitacion->delete();

         return 'Habitacion eliminada exitosamente.';
     }

     public function updateHabitacion($id, $data)
     {
         $habitacion = Habitacion::find($id);

         if (!$habitacion) {
            $this->responseException('Habitacion no encontrada.');
         }

         // Definir los mensajes de error personalizados
         $messages = config('validaciones.habitacion');


         $validator = Validator::make($data, [
             'hotel_id' => 'integer',
             'tipo_habitacion_id' => 'integer',
             'cantidad' => 'integer|min:1',

         ], $messages);

         // Si la validación falla, lanzar una excepción
         if ($validator->fails()) {
             throw new ValidationException($validator);
         }

         $this->statusCantidadHotel($data['hotel_id'],$data['cantidad']);

         $habitacion->update($data);

         return $habitacion;
     }

     private function responseException($message)
     {
        throw new HttpResponseException(
            response()->json(['error'=>$message], 400));
     }
}
