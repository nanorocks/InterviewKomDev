<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\StoreRequest;
use App\Http\Resources\Users\AuthResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $token = $user->createToken('auth_token')->plainTextToken;

        return new AuthResource([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }


    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = $this->userService->firstOrFail($request['email']);

        $token = $user->createToken('auth_token')->plainTextToken;

        return new AuthResource([
            'access_token' => $token,
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
