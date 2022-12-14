<?php

namespace Analyzen\Auth\Http\Controllers;

use Analyzen\Auth\Http\Requests\UserRequest;
use Analyzen\Auth\Http\Resources\UserResource;
use Analyzen\Auth\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function register(UserRequest $request)
    {
        $userData = $request->all();
        $userData['password'] = bcrypt($userData['password']);
        $userData['status'] = 1;
        $userData['role'] = 'admin';

        $user = User::create($userData);

        return response(new UserResource($user), 201);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $token = $user->token();
        $token->revoke();

        return response([
            'message' => "Logout",
        ]);
    }
}
