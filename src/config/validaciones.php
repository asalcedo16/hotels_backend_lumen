<?php

return [
    'hotel' => [
        'nombre.required' => 'El nombre del hotel es obligatorio.',
        'nombre.string' => 'El nombre del hotel debe ser una cadena de texto.',
        'direccion.required' => 'La dirección es obligatoria.',
        'direccion.string' => 'La dirección debe ser una cadena de texto.',
        'nit.required' => 'El NIT es obligatorio.',
        'nit.string' => 'El NIT debe ser una cadena de texto.',
        'nit.unique' => 'El NIT ya esta registrado en el sistema.',
        'telefono.required' => 'El teléfono es obligatorio.',
        'telefono.string' => 'El teléfono debe ser una cadena de texto.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El correo electrónico debe tener un formato válido.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'cantidad.integer' => 'La cantidad debe ser un valor entero',
        'cantidad.required' => 'La cantidad es obligatoria',
        'cantidad.min' => 'La cantidad debe ser mayor a cero (0)',
    ],
    'habitacion' => [
        'hotel_id.required' => 'Es necesario selecionar un hotel',
        'hotel_id.integer' => 'El Id del hotel debe ser un entero',
        'tipo_habitacion_id.required' => 'Es necesario selecionar un tipo de habitacion',
        'tipo_habitacion_id.integer' => 'El Id de la habitacion debe ser un entero',
        'cantidad.required' => 'Es necesario ingresar las cantidad de habitaciones',
        'cantidad.integer' => 'La cantidad de habitacion debe ser un entero',
        'cantidad.min' => 'La cantidad debe ser mayor a cero (0)',
    ]

];
