<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CinemaController;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\MovieController;
use App\Http\Controllers\Api\V1\RoleController;
use App\Http\Controllers\Api\V1\SectionController;
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::apiResource('user', UserController::class);
Route::post('/userToRole', [UserController::class, 'userToRole']);

Route::apiResource('role', RoleController::class);
Route::post('/roleToUser', [RoleController::class, 'roleToUser']);

Route::apiResource('movie', MovieController::class);
Route::post('/movieToUser', [MovieController::class, 'movieToUser']);

Route::apiResource('cinema', CinemaController::class);
Route::apiResource('section', SectionController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('city', CityController::class);
Route::apiResource('ticket', TicketController::class);

