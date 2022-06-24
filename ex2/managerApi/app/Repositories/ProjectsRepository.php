<?php

namespace App\Repositories;

use App\Interfaces\IProjectsRepository;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ProjectsRepository extends AbstractRepository implements IProjectsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Project::class;

    public function with(string $relationName): Builder
    {
        return $this->modelInstance->with($relationName);
    }
}
