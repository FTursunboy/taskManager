<?php

namespace App\DTO;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;

class LoginDTO
{

    public function __construct(public string $login, public string $password)
    {
    }

    public static function fromRequest(LoginRequest $request) :self
    {
        return new static(
            $request->get('login'),
            $request->get('password')
        );
    }

}
