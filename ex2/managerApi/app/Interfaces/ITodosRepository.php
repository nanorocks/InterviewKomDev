<?php

namespace App\Interfaces;

use Torann\LaravelRepository\Contracts\RepositoryContract as IBaseRepository;

interface ITodosRepository extends IBaseRepository
{
    public function create(array $params);
}
