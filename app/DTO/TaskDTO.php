<?php

namespace App\DTO;

use App\Http\Requests\TaskRequest;

class TaskDTO
{

    public function __construct(public string $name, public string $date, public string $description)
    {
    }

    public static function fromRequest(TaskRequest $request) :self
    {
        return new static(
            $request->get('name'),
            $request->get('date'),
            $request->get('description')
        );
    }

}
