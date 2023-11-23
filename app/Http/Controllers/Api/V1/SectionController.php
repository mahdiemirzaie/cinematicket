<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SectionController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        $section =Section::with(["cinema","tickets","movie"])->get();
        return $this->successResponse(
            SectionResource::collection($section),
        );
    }


    public function store(StoreSectionRequest $request, section $section): JsonResponse
    {
        $section = Section::create($request->validated());
        return $this->successResponse(
            SectionResource::make($section),
            trans('salon.success_store'),
            201
        );
    }


    public function show(Section $section)
    {
        return SectionResource::make($section->load(['cinema','tickets','movie']));


    }


    public function update(UpdateSectionRequest $request, Section $section): JsonResponse
    {
        $section->update($request->validated());
        return $this->successResponse(
            SectionResource::make($section),
            trans('salon.success_store'),
            201
        );

    }

    public function destroy(Request $request, Section $section)
    {
        $section->delete();
        return $this->successResponse(
            SectionResource::make($section),
            trans('salon.success_store'),
            201
        );
    }

    public function sectionToMovie(Request $request)
    {
        $section_id = $request->input('section_id');
        $section = Section::find($section_id);
        $movies = $request->input('movies');
        $section->movies()->attach($movies);
//        $section->movies()->detach($movies);
//        $section->movies()->sync($movies);
    }
}

