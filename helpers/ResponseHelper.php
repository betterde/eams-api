<?php

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Pagination\LengthAwarePaginator;

if (! function_exists('stored')) {
    /**
     * Response after creating resource successfully.
     *
     * Date: 21/03/2018
     * @author George
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    function stored($data, string $message = 'Created successfully!'): JsonResponse
    {
        return respond($data, $message);
    }
}

if (! function_exists('updated')) {
    /**
     * Response after updating resource successfully.
     *
     * Date: 21/03/2018
     * @author George
     * @param $data
     * @param string $message
     * @return JsonResponse
     */
    function updated($data, string $message = 'Update completed!'): JsonResponse
    {
        return respond($data, $message);
    }
}

if (! function_exists('deleted')) {
    /**
     * Response after the resource is successfully deleted.
     *
     * Date: 21/03/2018
     * @author George
     * @param string $message
     * @return JsonResponse
     */
    function deleted(string $message = 'Successfully deleted!'): JsonResponse
    {
        return message($message);
    }
}

if (! function_exists('accepted')) {
    /**
     * The request has been put into the task queue for response.
     *
     * Date: 21/03/2018
     * @author George
     * @param string $message
     * @return JsonResponse
     */
    function accepted(string $message = 'Request accepted, pending processing'): JsonResponse
    {
        return message($message, Response::HTTP_ACCEPTED);
    }
}

if (! function_exists('notFound')) {
    /**
     * Resource not found response.
     *
     * Date: 21/03/2018
     * @author George
     * @param string $message
     * @return JsonResponse
     */
    function notFound(string $message = 'The resource you accessed does not exist.'): JsonResponse
    {
        return message($message, Response::HTTP_NOT_FOUND);
    }
}

if (! function_exists('internalError')) {
    /**
     * Server-side location error response.
     *
     * Date: 21/03/2018
     * @author George
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    function internalError(string $message = 'An unknown error caused the request to fail!', int $code = Response::HTTP_INTERNAL_SERVER_ERROR): JsonResponse
    {
        return message($message, $code);
    }
}

if (! function_exists('failed')) {
    /**
     * Bad request response.
     *
     * Date: 21/03/2018
     * @author George
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    function failed($message, int $code = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        return message($message, $code);
    }
}

if (! function_exists('success')) {
    /**
     * Successful response.
     *
     * Date: 21/03/2018
     * @author George
     * @param $date
     * @return JsonResponse
     */
    function success($date): JsonResponse
    {
        return respond($date);
    }
}

if (! function_exists('message')) {
    /**
     * Message response.
     *
     * Date: 21/03/2018
     * @author George
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    function message($message, int $code = Response::HTTP_OK): JsonResponse
    {
        return respond([], $message, $code);
    }
}

if (! function_exists('respond')) {
    /**
     * Generate response body.
     *
     * Date: 21/03/2018
     * @author George
     * @param array $data
     * @param string $message
     * @param int $code
     * @param array $header
     * @return JsonResponse
     */
    function respond($data = [], string $message = 'Successful request!', int $code = Response::HTTP_OK, array $header = []): JsonResponse
    {
        if ($data instanceof LengthAwarePaginator) {
            return new JsonResponse([
                'code' => $code,
                'message' => $message,
                'data' => $data->items(),
                'current_page' => $data->currentPage(),
                'from' => $data->firstItem(),
                'per_page' => $data->perPage(),
                'to' => $data->lastItem(),
                'last_page' => $data->lastPage(),
                'total' => $data->total(),
            ], $code, $header, JSON_UNESCAPED_UNICODE);
        } else {
            return new JsonResponse([
                'code' => $code,
                'message' => $message,
                'data' => $data ? $data : []
            ], $code, $header, JSON_UNESCAPED_UNICODE);
        }
    }
}