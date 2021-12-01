<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register (UserCreateRequest $request)
    {
        $fields = $request->validated();

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'phone' => $fields['phone'],
            'passport_number' => $fields['passport_number'],
            'password' => Hash::make($fields['password']),
        ]);

        $token = $user->createToken('appPets')->plainTextToken;

        $response = [
            'data' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login (UserLoginRequest $request)
    {
        $fields = $request->validated();

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Не верное имя или пароль'
            ], 401);
        }

        $token = $user->createToken('appPets')->plainTextToken;

        $response = [
            'data' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => 'Вы вышли из системы'
        ], 201);
    }
}
