<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCtegoryRequest;
use App\Http\Requests\UpdateCtegoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{
//    public function __construct()
//    {
//        $this->middleware('auth:sanctum');
//    }

    public function index(Request $request)
    {

        if (isset($request['children']) && !isset($request['parent'])) {
            $categories = Category::with(['children'])->get();
        } elseif (isset($request['parent']) && !isset($request['children'])) {
            $categories = Category::with(['parent'])->get();
        } elseif (isset($request['children']) && isset($request['parent'])) {
            $categories = Category::with(['parent', 'children'])->get();
        } else$categories = Category::all();

        return $this->successResponse(
            CategoryResource::collection($categories),
        );
    }


    public function store(StoreCtegoryRequest $request)
    {
        $category = Category::create($request->validated());
        return $this->successResponse(
            CategoryResource::make($category),
            trans('category.success_store'),
            201
        );
    }


    public function show(Category $category)
    {
        return CategoryResource::make($category->load(['parent', 'children']));


    }


    public function update(UpdateCtegoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return $this->successResponse(
            CategoryResource::make($category),
            trans('category.success_store'),
            201
        );

    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return $this->successResponse(
            CategoryResource::make($category),
            trans('category.success_store'),
            201
        );
    }
}
