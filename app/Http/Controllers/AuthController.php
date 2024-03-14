<?php

namespace App\Http\Controllers;

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
        $user = $this->service->login($request->login);

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
