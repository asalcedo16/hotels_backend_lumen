<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HabitacionService;


class HabitacionController extends Controller
{
    protected $habitacionService;

    public function __construct(HabitacionService $habitacionService)
    {
        $this->habitacionService = $habitacionService;
    }

    public function index($hotel_id)
    {

    }

    public function store(Request $request)
    {
        try {
            $habitacion = $this->habitacionService->createHabitacion($request->all());
            return response()->json($habitacion, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function destroy()
    {

    }

    public function update()
    {

    }

    public function hotelHabitacion($hotel_id)
    {
       return $this->habitacionService->getAllHotelHabitacion($hotel_id);
    }

    public function tipoHabitacion()
    {
       return $this->habitacionService->getTipoHabitacion();
    }

    public function tipoHabitacionAcomodacion()
    {
       return $this->habitacionService->getTipoHabitacionAcomodacion();
    }


    //
}
