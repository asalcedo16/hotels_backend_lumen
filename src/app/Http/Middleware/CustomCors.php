<?php

namespace App\Http\Middleware;

use Closure;

class CustomCors
{
    public function handle($request, Closure $next)
    {
        // Permitir cualquier origen (cambiar según tus necesidades)
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

        return $next($request);
    }
}
