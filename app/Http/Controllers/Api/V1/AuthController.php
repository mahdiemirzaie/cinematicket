<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseApiController
{

    public function register(RegisterRequest $request)
    {
        $users = User::create($request->validated());
        return $this->successResponse(
            UserResource::make($users));

    }


    public function login(LoginRequest $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $Success['token'] = $user->createToken('MyApp')->plainTextToken;
            $Success['name'] = UserResource::make($user->load('roles'));
            return $this->successResponse(
                $Success,
                trans('user.success_store'),
                201);
        } else {
            return 'unauthorized';
        }

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->successResponse([], 'User logged out successfully');
    }
}
