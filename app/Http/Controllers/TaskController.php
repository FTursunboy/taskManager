<?php

namespace App\Http\Controllers;

use App\DTO\TaskDTO;
use App\DTO\UpdateTaskDTO;
use App\Filters\TaskFilter;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use App\Traits\ApiResponse;

class TaskController extends Controller
{
    use ApiResponse;
    private TaskService $service;

    public function __construct(TaskService $service)
    {
       return  $this->service = $service;
    }

    public function index()
    {
        return $this->success(TaskResource::collection($this->service->index()));
    }

    public function store(TaskRequest $request)
    {
        return $this->created(new TaskResource($this->service->store(TaskDTO::fromRequest($request))));
    }

    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $this->success($this->service->update($task, UpdateTaskDTO::fromRequest($request)));

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        return $this->success($this->service->delete($task));
    }

    public function filter(TaskFilter $filters)
    {
        return $this->paginate(Task::filter($filters)->paginate(10));
    }
}
