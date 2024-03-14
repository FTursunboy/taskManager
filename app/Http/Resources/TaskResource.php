<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Task */
class TaskResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'status' => $this->status,
            'date' => $this->date,
            'description' => $this->description,
            'user' => $this->user,
            'created_at' => $this->created_at,
        ];
    }
}
