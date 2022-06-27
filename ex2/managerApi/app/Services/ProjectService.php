<?php

namespace App\Services;

use App\Interfaces\IProjectsRepository;
use App\Models\Project;
use Illuminate\Pagination\LengthAwarePaginator;

class ProjectService
{

    public IProjectsRepository $projectRepository;

    public function __construct(IProjectsRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store($request): Project
    {
        $project = $this->projectRepository->create([
            Project::PROJECT_NAME => $request->name
        ]);

        $user = auth('sanctum')->user();

        $project->users()->attach($user->id);

        return $project;
    }

    public function paginate(int $limit): LengthAwarePaginator
    {
        return $this->projectRepository->with('todos')->paginate($limit);
    }
}
