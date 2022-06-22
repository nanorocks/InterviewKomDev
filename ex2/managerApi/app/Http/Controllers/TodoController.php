<?php

namespace App\Http\Controllers;

use App\Http\Resources\Todos\CollectionTodoResource;
use App\Http\Resources\Todos\SingleTodoResource;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store()
    {
        // TODO add todo by user in project
        return new SingleTodoResource();
    }

    public function todo(int $id)
    {
        // TODO single todo to show and add counter
        return new SingleTodoResource();
    }

    public function isDone(int $id)
    {
        // TODO update single todo as done
        return new SingleTodoResource();
    }

    public function paginate(int $id)
    {
        // TODO list of todos for specific project and user
        return new CollectionTodoResource();
    }

    public function deleted(int $id)
    {
        // TODO delete single todo
        return new SingleTodoResource();
    }
}
