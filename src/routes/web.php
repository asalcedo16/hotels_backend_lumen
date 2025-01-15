<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//Ruta para gestion de hoteles
$router->get('/hoteles', 'HotelController@index');
$router->post('/hoteles', 'HotelController@store');
$router->put('/hoteles/{id}', 'HotelController@update');
$router->delete('/hoteles/{id}', 'HotelController@destroy');


//Rutas para gestion de habitaciones
$router->post('/hoteles/habitaciones', 'HabitacionController@store');
$router->get('/hoteles/{hotel_id}/habitaciones', 'HabitacionController@hotelHabitacion');
$router->get('/habitaciones', 'HabitacionController@tipoHabitacion');
$router->get('/habitaciones/acomodaciones', 'HabitacionController@tipoHabitacionAcomodacion');


$router->get('/ciudades', function () {
    $path = storage_path('ciudades.json'); // Ruta del archivo JSON
    if (!file_exists($path)) {
        return response()->json(['error' => 'Archivo no encontrado'], 404);
    }

    $ciudades = json_decode(file_get_contents($path), true);
    return response()->json($ciudades, 200);
});

