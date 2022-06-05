<?php

namespace App\Exceptions;

use App\Helpers\ResponseHelper;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response as HttpResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $response = new ResponseHelper;
        $this->reportable(function (Throwable $e) {

        });

        $this->renderable(function (NotFoundHttpException $e, $request) use ($response) {
            $response->setHttpCode(HttpResponse::HTTP_NOT_FOUND);
            $response->setCode($e->getCode());
            $response->setStatus(false);
            $response->setMessage($e->getMessage());
            return $response->setResponse();
        });

        $this->renderable(function (TokenInvalidException $e, $request) use ($response) {
            $response->setHttpCode(HttpResponse::HTTP_UNAUTHORIZED);
            $response->setCode($e->getCode());
            $response->setStatus(false);
            $response->setMessage($e->getMessage());
            return $response->setResponse();
        });

        $this->renderable(function (TokenExpiredException $e, $request) use ($response) {
            $response->setHttpCode(HttpResponse::HTTP_UNAUTHORIZED);
            $response->setCode($e->getCode());
            $response->setStatus(false);
            $response->setMessage($e->getMessage());
            return $response->setResponse();
        });

        $this->renderable(function (JWTException $e, $request) use ($response) {
            $response->setHttpCode(HttpResponse::HTTP_UNAUTHORIZED);
            $response->setCode($e->getCode());
            $response->setStatus(false);
            $response->setMessage($e->getMessage());
            return $response->setResponse();
        });
    }
}
