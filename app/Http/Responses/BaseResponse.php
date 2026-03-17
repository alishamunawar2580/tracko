<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseResponse
{
    protected static string $module = 'responses';

    public function __construct(string $module = 'responses')
    {
        static::$module = $module;
    }

    protected static function getMessage(string $key): string
    {
        return __('messages.' . static::$module . '.' . $key);
    }

    public static function success(mixed $data = null, string $message = null, int $code = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? static::getMessage('success'),
            'data' => $data
        ], $code);
    }

    public static function error(string $message = null, int $code = 400, array $errors = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message ?? static::getMessage('error_occurred')
        ];

        if (!empty($errors)) {
            $response['errors'] = $errors;
        }

        return response()->json($response, $code);
    }

    public static function created(mixed $data = null, string $message = null): JsonResponse
    {
        return self::success($data, $message ?? static::getMessage('created_successfully'), 201);
    }

    public static function updated(mixed $data = null, string $message = null): JsonResponse
    {
        return self::success($data, $message ?? static::getMessage('updated_successfully'), 200);
    }

    public static function deleted(string $message = null): JsonResponse
    {
        return self::success(null, $message ?? static::getMessage('deleted_successfully'), 200);
    }

    public static function notFound(string $message = null): JsonResponse
    {
        return self::error($message ?? static::getMessage('resource_not_found'), 404);
    }

    public static function unauthorized(string $message = null): JsonResponse
    {
        return self::error($message ?? static::getMessage('unauthorized'), 401);
    }

    public static function forbidden(string $message = null): JsonResponse
    {
        return self::error($message ?? static::getMessage('forbidden'), 403);
    }

    public static function validationError(array $errors, string $message = null): JsonResponse
    {
        return self::error($message ?? static::getMessage('validation_failed'), 422, $errors);
    }

    public static function serverError(string $message = null): JsonResponse
    {
        return self::error($message ?? static::getMessage('internal_server_error'), 500);
    }

    public static function paginated(LengthAwarePaginator $paginator, string $message = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? __('responses.data_retrieved_successfully'),
            'data' => $paginator->items(),
            'pagination' => [
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
                'last_page' => $paginator->lastPage(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem()
            ]
        ]);
    }

    public static function resource(JsonResource $resource, string $message = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? __('responses.data_retrieved_successfully'),
            'data' => $resource
        ]);
    }

    public static function collection($collection, string $message = null): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? __('responses.data_retrieved_successfully'),
            'data' => $collection,
            'count' => is_countable($collection) ? count($collection) : 0
        ]);
    }

    public static function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    public static function custom(array $data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }
}