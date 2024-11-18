<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserPostRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function register(RegisterUserPostRequest $request): JsonResponse
    {
        $user = User::create($request->validated());

        return response()->json([
            'user_id' => $user->id,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ]);
    }
}
