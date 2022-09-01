<?php

namespace Analyzen\Auth\Http\Controllers;

use Illuminate\Http\Request;
use Pathshala\Auth\Http\Requests\BasicProfileRequest;
use Pathshala\Auth\Http\Requests\UserRequest;
use Pathshala\Auth\Http\Resources\UserResource;
use Pathshala\Auth\Models\User;

class UserController extends BaseController
{
    public function register(Request $request)
    {
        dd("inside");
    }
}
