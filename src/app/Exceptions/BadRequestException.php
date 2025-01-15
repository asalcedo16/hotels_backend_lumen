<?php
namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Support\Responsable;
use Throwable;
use Illuminate\Http\Response;

class BadRequestException extends  Exception implements Responsable
{

    const DEFAULT_ERROR_MESSAGE='Bad Request Exception';

    public function __construct($message =self::DEFAULT_ERROR_MESSAGE , $code = Response::HTTP_BAD_REQUEST, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

    }

    public function toResponse($request)
    {
        return response()->json(['errors'=>$this->getMessage()],400)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*')
        ->header('Access-Control-Allow-Headers', '*');;
    }
}
