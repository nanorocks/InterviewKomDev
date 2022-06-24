<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface IProjectsRepository
{
  public function create(array $params);

  public function with(string $relationName): Builder;

  public function paginate(int $limit);
}
