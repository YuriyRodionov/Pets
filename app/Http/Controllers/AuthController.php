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
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'passport_number' => $request->passport_number,
            'password' => Hash::make($request->password)
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

        $user = User::query()->where('email', $fields['email'])->first();

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
