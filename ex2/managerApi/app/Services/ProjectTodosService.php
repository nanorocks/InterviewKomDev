<?php

namespace App\Services;

use App\Interfaces\ITodosRepository;
use App\Models\Project;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectTodosService
{

    public ITodosRepository $todosRepository;

    public function __construct(ITodosRepository $todosRepository)
    {
        $this->todosRepository = $todosRepository;
    }

    public function store($request): Todo
    {
        $user = auth('sanctum')->user();

        $todo = $this->todosRepository->create([
            Todo::DESCRIPTION => $request->description,
            User::RELATION_USER_ID => $user->id,
            Project::RELATION_PROJECT_ID => $request->project_id
        ]);

        return $todo;
    }

    public function paginate(int $limit): LengthAwarePaginator
    {
        return $this->todosRepository->paginate($limit);
    }

    public function delete(int $id): Todo
    {
        $todo = $this->todosRepository->findOrFail($id);

        $todo->delete();

        return $todo;
    }

    public function singleTodoIsDone(int $id): Todo
    {
        $todo = $this->todosRepository->findOrFail($id);

        $this->todosRepository->update($todo, [
            Todo::IS_DONE => (int)!$todo->is_done
        ]);

        return $todo;
    }

    public function singleTodo(int $id): Todo
    {
        $todo = $this->todosRepository->findOrFail($id);

        $this->todosRepository->update($todo, [
            Todo::TRACK_COUNTER => $todo->counter + 1
        ]);

        return $todo;
    }
}
