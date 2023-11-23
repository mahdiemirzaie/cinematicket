<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        $users = User::all();

        return $this->successResponse(
            UserResource::collection(User::with('roles')->get()),
        );
    }


    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        $user->roles()->sync([1,2]);
        return $this->successResponse(
            UserResource::make($user)($user->load('roles')),
            trans('user.success_store'),
            201
        );
    }


    public function show(User $user)
    {
        return UserResource::make($user->load(['roles']));


    }


    public function update(UpdateUserRequest $request, user $user)
    {
        $user->update($request->validated());
        return $this->successResponse(
            UserResource::make($user),
            trans('user.success_store'),
            201
        );

    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return $this->successResponse(
            UserResource::make($user),
            trans('user.success_store'),
            201
        );
    }

    public function userToRole(Request $request)
    {
        $user_id = $request->input('user_id');
        $user = User::find($user_id);
        $roles = $request->input('roles');
        $user->roles()->attach($roles);
//        $user->roles()->detach($roles);
//        $user->roles()->sync($roles);
    }
}
