<?php

namespace App\Http\Controllers;

use App\DTO\LoginDTO;
use App\DTO\TaskDTO;
use App\DTO\UserDTO;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\TaskResource;
use App\Http\Resources\UserResource;
use App\Models\Task;
use App\Services\AuthService;
use App\Services\TaskService;
use App\Traits\ApiResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponse;

    private AuthService $service;

    public function __construct(AuthService $service)
    {
        return $this->service = $service;
    }

    public function login(LoginRequest $request)
    {
        $user = $this->service->login(LoginDTO::fromRequest($request));

        if (!$user) {
            throw ValidationException::withMessages(['message' => __('auth.failed')]);
        }

        return response()->json([
            'user' => new UserResource($user),
            'token' => $user->createToken('api Token')->plainTextToken
        ]);
    }

    public function register(UserRequest $request)
    {
        return $this->created(new UserResource($this->service->register(UserDTO::fromRequest($request))));
    }

}
