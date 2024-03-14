<?php

namespace App\Services;

use App\DTO\LoginDTO;
use App\DTO\TaskDTO;
use App\DTO\UserDTO;
use App\Models\Task;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function login(LoginDTO $dto) :User|null
    {
       $user = User::where('login', $dto->login)->first();


       if (!Hash::check($user->password, $dto->password)) {
           return $user;
       }

       return null;
    }


    public function register(UserDTO $dto) :User
    {
        return User::create([
            'name' => $dto->name,
            'login' => $dto->login,
            'password' => Hash::make($dto->password),
        ]);
    }

}
