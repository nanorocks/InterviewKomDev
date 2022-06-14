<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store()
    {
        // TODO add todo by user in project
    }

    public function todo(int $id)
    {
        // TODO single todo to show and add counter
    }

    public function isDone(int $id)
    {
        // TODO update single todo as done
    }

    public function paginate(int $id)
    {
        // TODO list of todos for specific project and user
    }

    public function deleted(int $id)
    {
        // TODO delete single todo
    }
}
