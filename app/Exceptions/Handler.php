<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ValidationException::class,
        ModelNotFoundException::class,
        AuthorizationException::class,
        AuthenticationException::class,
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
     * @param Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param Request $request
     * @param Exception $exception
     * @return JsonResponse
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return failed(Arr::first(Arr::collapse($exception->errors())), 422);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return failed($exception->getMessage(), 405);
        }

        if ($exception instanceof ModelNotFoundException) {
            return notFound();
        }

        if ($exception instanceof NotFoundHttpException) {
            return notFound();
        }

        return parent::render($request, $exception);
    }

    /**
     * Unauthenticated handler
     *
     * Date: 2018/10/14
     * @author George
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse|Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return failed('Unauthenticated', 401);
    }
}
