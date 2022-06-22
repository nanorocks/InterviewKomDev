<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\StoreRequest;
use App\Http\Resources\Projects\CollectionProjectResource;
use App\Http\Resources\Projects\SingleProjectResource;
use App\Models\Project;
use App\Repositories\ProjectsRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public ProjectsRepository $projectRepository;

    public function __construct(ProjectsRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store(StoreRequest $request)
    {
        $project = $this->projectRepository->create([
            Project::PROJECT_NAME => $request->name
        ]);

        $user = auth('sanctum')->user();

        $project->users()->attach($user->id);

        // add project to database by user
        return new SingleProjectResource($project);
    }

    public function paginate(Request $request)
    {
        // list projects with todos by specific user and paginate
        return new CollectionProjectResource($this->projectRepository->with('todos')->paginate($request->get('limit') ?? 10));
    }

}
