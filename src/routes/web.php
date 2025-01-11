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
