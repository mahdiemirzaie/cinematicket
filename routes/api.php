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

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');


Route::apiResource('user', UserController::class);
Route::get('user/restore/{user}', [UserController::class,'restore'])->withTrashed();
Route::post('/userToRole', [UserController::class, 'userToRole']);

Route::apiResource('role', RoleController::class);
Route::get('role/restore/{role}', [RoleController::class,'restore'])->withTrashed();
Route::post('/roleToUser', [RoleController::class, 'roleToUser']);

Route::apiResource('movie', MovieController::class);
Route::get('movie/restore/{movie}', [MovieController::class,'restore'])->withTrashed();
Route::post('/movieToUser', [MovieController::class, 'movieToUser']);

Route::apiResource('cinema', CinemaController::class);
Route::get('cinema/restore/{cinema}', [CinemaController::class,'restore'])->withTrashed();

Route::apiResource('section', SectionController::class);
Route::get('section/restore/{section}', [SectionController::class,'restore'])->withTrashed();

Route::apiResource('category', CategoryController::class);
Route::get('category/restore/{category}', [CategoryController::class,'restore'])->withTrashed();

Route::apiResource('city', CityController::class);
Route::get('city/restore/{city}', [CityController::class,'restore'])->withTrashed();

Route::apiResource('ticket', TicketController::class);
Route::get('ticket/restore/{ticket}', [TicketController::class,'restore'])->withTrashed();


