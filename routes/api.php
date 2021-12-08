<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResources([
    'applications' => ApplicationController::class,
    'users' => UserController::class,
    'animal-types' => AnimalTypeController::class
]);

Route::get('/users/profile/{user_id}', [UserController::class, 'getUserProfile']);

Route::get('/applications/users/{user_id}', [ApplicationController::class, 'getUserApplication']);
Route::get('/applications/status/{status}', [ApplicationController::class, 'searchAllStatus']);
Route::get('/applications/users/{user_id}/{status}', [ApplicationController::class, 'getApplicationStatus']);


Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/text', function (){
        return response(['message' => 'Доступ разрешен'], 201);
    });
});
