<?php

namespace App\Repositories;

use App\Models\Project;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class ProjectsRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Project::class;

    public function with(string $relationName)
    {
        return $this->modelInstance->with($relationName);
    }
}
