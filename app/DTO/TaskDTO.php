<?php

namespace App\DTO;

use App\Http\Requests\TaskRequest;

class TaskDTO
{

    public function __construct(public string $name, public string $status, public string $date, public string $description, public string $user_id)
    {
    }

    public static function fromRequest(TaskRequest $request) :self
    {
        return new static(
            $request->get('name'),
            $request->get('status'),
            $request->get('date'),
            $request->get('description'),
            $request->get('user_id')
        );
    }

}
