<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Resources\Users\AuthResource;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(StoreRequest $request)
    {
        $user = $this->userService->create($request);

        return new AuthResource([
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }


    public function login(Request $request)
    {
        $user = $this->userService->firstOrFail($request['email']);

        return new AuthResource([
            'access_token' => $user->createToken('auth_token')->plainTextToken,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        return new AuthResource([
            'user' => $request->user(),
        ]);
    }
}
