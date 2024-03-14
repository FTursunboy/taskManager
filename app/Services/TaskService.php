<?php

namespace App\Services;

use App\DTO\TaskDTO;
use App\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class TaskService
{
    const ON_PAGE = 10;

    public function index() :LengthAwarePaginator
    {
       return Task::where('user_id', Auth::user()->id)->paginate(self::ON_PAGE);
    }


    public function store(TaskDTO $dto) :Task
    {
        return Task::create([
            'name' => $dto->name,
            'status' => $dto->status,
            'date' => $dto->date,
            'description' => $dto->description,
            'user_id' => $dto->user_id
        ]);
    }

    public function update(Task $task, TaskDTO $dto) :Task
    {
        $task->update([
            'name' => $dto->name,
            'status' => $dto->status,
            'date' => $dto->date,
            'description' => $dto->description,
            'user_id' => $dto->user_id
        ]);

        return $task;
    }

    public function delete(Task $task) :bool
    {
       return $task->delete();
    }


}
