<?php

namespace App\Repositories;

use App\Models\Todo;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class TodosRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Todo::class;
}
