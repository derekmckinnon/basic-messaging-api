<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginUserPostRequest;
use App\Http\Requests\RegisterUserPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterUserPostRequest $request): User
    {
        return User::query()->create($request->validated());
    }

    public function login(LoginUserPostRequest $request): User
    {
        $email = $request->validated('email');

        $user = User::query()->where('email', $email)->first();
        if (!$user || !Hash::check($request->validated('password'), $user->password)) {
            throw new ApiException(101, 'Login Error', 'Email or password is invalid');
        }

        return $user;
    }
}
