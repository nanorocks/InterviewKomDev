<?php

namespace App\Interfaces;

interface IUsersRepository
{
    public function create(array $params);

    public function firstOrFailWhere(string $key, string $value);
}
