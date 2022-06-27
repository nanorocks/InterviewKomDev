<?php

namespace App\Http\Controllers;

use App\Http\Requests\Todos\StoreRequest;
use App\Http\Resources\Todos\CollectionTodoResource;
use App\Http\Resources\Todos\SingleTodoResource;
use App\Services\ProjectTodosService;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public ProjectTodosService $todoService;

    public function __construct(ProjectTodosService $todoService)
    {
        $this->todoService = $todoService;
    }

    public function store(StoreRequest $request)
    {
        return new SingleTodoResource($this->todoService->store($request));
    }

    public function todo(int $id)
    {
        return new SingleTodoResource($this->todoService->singleTodo($id));
    }

    public function isDone(int $id)
    {
        return new SingleTodoResource($this->todoService->singleTodoIsDone($id));
    }

    public function paginate(Request $request)
    {
        return new CollectionTodoResource($this->todoService->paginate($request->get('limit') ?? 10));
    }

    public function delete(int $id)
    {
        return new SingleTodoResource($this->todoService->delete($id));
    }
}
