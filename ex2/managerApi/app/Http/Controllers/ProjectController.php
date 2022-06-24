<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\StoreRequest;
use App\Http\Resources\Projects\CollectionProjectResource;
use App\Http\Resources\Projects\SingleProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function store(StoreRequest $request)
    {
        return new SingleProjectResource($this->projectService->store($request));
    }

    public function paginate(Request $request)
    {
        return new CollectionProjectResource($this->projectService->paginate($request->get('limit') ?? 10));
    }

}
