<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;
use Torann\LaravelRepository\Contracts\RepositoryContract as IBaseRepository;
interface IProjectsRepository extends IBaseRepository
{

  public function with(string $relationName): Builder;

}
