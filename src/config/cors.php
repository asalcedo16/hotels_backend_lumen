<?php

return [
    'supports_credentials' => false,
    'allowed_origins' => ['*'], // Permitir todas las solicitudes de cualquier origen
    'allowed_headers' => ['Content-Type', 'X-Requested-With', 'Authorization'],
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
    'exposed_headers' => [],
    'max_age' => 0,
    'hosts' => ['*'],
];



