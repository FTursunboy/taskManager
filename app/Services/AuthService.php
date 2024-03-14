<?php

namespace App\Services;

use App\DTO\TaskDTO;
use App\DTO\UserDTO;
use App\Models\Task;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(string $login) :User
    {
       return User::where('login', $login)->first();
    }


    public function register(UserDTO $dto) :User
    {
        return User::create([
            'name' => $dto->name,
            'login' => $dto->login,
            'password' => $dto->password
        ]);
    }

}
