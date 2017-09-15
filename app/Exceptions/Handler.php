<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        //Custom message if the method is not the correct
        if ($exception instanceof MethodNotAllowedHttpException){
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  666,
                                    'error_message' => 'Method Not Allowed HttpException'
                                ], 405);
        }
        //Custom message if not exist the function
        if ($exception instanceof NotFoundHttpException){
            return response()->json([
                                    'success' => false,
                                    'error_code' =>  000,
                                    'error_message' => 'Not Found HttpException'
                                ], 404);
        }
        return parent::render($request, $exception);
    }
}
