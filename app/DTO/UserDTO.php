<?php

namespace App\DTO;

use App\Http\Requests\TaskRequest;
use App\Http\Requests\UserRequest;

class UserDTO
{

    public function __construct(public string $name, public string $login, public string $password)
    {
    }

    public static function fromRequest(UserRequest $request) :self
    {
        return new static(
            $request->get('name'),
            $request->get('login'),
            $request->get('password')
        );
    }

}
