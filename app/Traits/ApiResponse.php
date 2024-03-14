<?php

namespace App\Traits;

use App\Enums\ApiResponse as ApiResponseEnum;
use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function success($result = null, $code = 200): JsonResponse
    {
        return response()->json(['result' => $result ?? ApiResponseEnum::Success, 'errors' => null], $code);
    }

    public function error($result, $code = 400): JsonResponse
    {
        return response()->json(['result' => null, 'errors' => $result ?? ApiResponseEnum::Error], $code);
    }

    public function notAccess($result, $code = 403): JsonResponse
    {
        return response()->json(['result' => null, 'errors' => $result ?? ApiResponseEnum::Error], $code);
    }

    public function created($result, $code = 201) :JsonResponse
    {
        return response()->json(['result' => $result ?? ApiResponseEnum::Created, 'errors' => null], $code);
    }

    public function deleted() :JsonResponse
    {
        return response()->json(['result' => ApiResponseEnum::Deleted, 'errors' => null]);
    }

    public function paginate($result = 'Успешно', $code = 200): JsonResponse
    {
        if (is_string($result)) {
            return $this->success($result, $code);
        }

        return response()->json(['result' => paginatedResponse($result)], $code);
    }
}
