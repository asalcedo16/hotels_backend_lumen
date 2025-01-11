<?php

namespace App\Http\Controllers;

use App\Services\HotelService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class HotelController extends Controller
{
    protected $hotelService;

    public function __construct(HotelService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function store(Request $request)
    {
        try {
            $hotel = $this->hotelService->createHotel($request->all());
            return response()->json($hotel, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function index()
    {
        $hoteles = $this->hotelService->getAllHotels();
        return response()->json($hoteles);
    }

    public function destroy($id)
    {
        try {
            $message = $this->hotelService->deleteHotel($id);
            return response()->json(['message' => $message], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $hotel = $this->hotelService->updateHotel($id, $request->all());
            return response()->json($hotel, 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
