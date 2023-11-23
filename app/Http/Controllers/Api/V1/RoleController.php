<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Faker\Provider\Base;
use Illuminate\Http\Request;

class RoleController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function index()
    {
        return $this->successResponse(
            RoleResource::collection(Role::with('users')->get()),
        );
    }


    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());
        $role->users()->sync([1,2]);
        return $this->successResponse(
            RoleResource::make(),
            trans('role.success_store'),
            201
        );
    }


    public function show(Role $role)
    {
        return RoleResource::make($role->load(['Users']));


    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());
        return $this->successResponse(
            RoleResource::make($role),
            trans('role.success_store'),
            201
        );

    }

    public function destroy(Request $request, Role $role)
    {
        $role->delete();
        return $this->successResponse(
            RoleResource::make($role),
            trans('role.success_store'),
            201
        );
    }

    public function roleToUser(Request $request)
    {
        $role_id=$request->input('role_id');
        $role=Role::find($role_id);
        $users=$request->input('users');
        $role->users()->attach($users);
//       $role->users()->detach($users);
//       $role->users()->sync($users);
    }
}
