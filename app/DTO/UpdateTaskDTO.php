<?php

namespace App\DTO;

use App\Http\Requests\TaskRequest;

class UpdateTaskDTO
{

    public function __construct(public string $name, public string $status, public string $date, public string $description)
    {
    }

    public static function fromRequest(TaskRequest $request) :self
    {
        return new static(
            $request->get('name'),
            $request->get('status'),
            $request->get('date'),
            $request->get('description')
        );
    }

}
