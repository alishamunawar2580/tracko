<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Models\ExceptionLog;

abstract class Controller
{
    protected function handleException(Exception $exception, string $context = ''): JsonResponse
    {
        $errorId = uniqid('ERR_');
        
        ExceptionLog::create([
            'error_id' => $errorId,
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
            'context' => $context,
            'controller' => get_class($this)
        ]);
        
        Log::error("[$errorId] Exception in $context", [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ]);

        return response()->json([
            'success' => false,
            'message' => 'An error occurred. Please try again.',
            'error_id' => $errorId
        ], 500);
    }

    protected function logError(Exception $exception, string $action = ''): void
    {
        $errorId = uniqid('ERR_');
        
        ExceptionLog::create([
            'error_id' => $errorId,
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString(),
            'context' => $action,
            'controller' => get_class($this)
        ]);
        
        Log::error("[$errorId] Error in $action: {$exception->getMessage()}", [
            'file' => basename($exception->getFile()),
            'line' => $exception->getLine()
        ]);
    }
}
