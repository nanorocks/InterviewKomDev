<?php

namespace App\Services;

use App\Interfaces\IUsersRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public IUsersRepository $userRepository;

    public function __construct(IUsersRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($request)
    {
        return $this->userRepository->create(
            [
                User::NAME => $request->name,
                User::EMAIL => $request->email,
                User::PASSWORD => Hash::make($request->password),
            ]
        );
    }

    public function firstOrFail(string $email)
    {
        return $this->userRepository->firstOrFailWhere(User::EMAIL, $email);
    }
}
