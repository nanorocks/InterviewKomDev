<?php

namespace App\Repositories;

use App\Interfaces\ITodosRepository;
use App\Models\Todo;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class TodosRepository extends AbstractRepository implements ITodosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = Todo::class;
}
