<?php

namespace App\Repositories;

use App\Models\User;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class UsersRepository extends AbstractRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = User::class;
}
