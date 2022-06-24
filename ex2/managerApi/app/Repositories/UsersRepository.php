<?php

namespace App\Repositories;

use App\Interfaces\IUsersRepository;
use App\Models\User;
use Torann\LaravelRepository\Repositories\AbstractRepository;

class UsersRepository extends AbstractRepository implements IUsersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = User::class;

    public function firstOrFailWhere(string $key, string $value)
    {
        return $this->modelInstance->where($key, $value)->first();
    }
}
