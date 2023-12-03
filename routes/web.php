<?php

use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;





Route::get('/login', [AuthController::class, 'login'])->name('web.login');
Route::get('/register', [AuthController::class, 'register'])->name('web.register');
Route::get('/logout', [AuthController::class, 'logout'])->name('web.logout');
