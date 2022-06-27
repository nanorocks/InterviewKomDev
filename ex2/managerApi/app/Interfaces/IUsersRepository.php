<?php

namespace App\Interfaces;
use Torann\LaravelRepository\Contracts\RepositoryContract as IBaseRepository;

interface IUsersRepository extends IBaseRepository
{
    public function create(array $params);

    public function firstOrFailWhere(string $key, string $value);
}
