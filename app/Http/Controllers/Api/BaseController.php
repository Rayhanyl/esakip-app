<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * Success response method.
     *
     * @param mixed $result
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($result, $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];

        if ($result instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $response['data'] = $result->items();
            $response['pagination'] = [
                'total' => $result->total(),
                'count' => $result->count(),
                'per_page' => $result->perPage(),
                'current_page' => $result->currentPage(),
                'total_pages' => $result->lastPage(),
            ];
        }

        return response()->json($response, 200);
    }

    /**
     * Return error response.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
