<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;
use App\Http\Resources\CinemaResource;
use App\Models\Cinema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CinemaController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        if (isset($request['ticket_max'])) {
            $cinemas = Cinema::withCount('tickets')
                ->orderByDesc('tickets_count')
                ->limit(1)
                ->get();
        } else $cinemas = Cinema::with(["city", "sections",])->get();
        return $this->successResponse(
            CinemaResource::collection($cinemas),
        );
    }


    public function store(StoreCinemaRequest $request)
    {
        $cinema = Cinema::create($request->validated());
        return $this->successResponse(
            CinemaResource::make($cinema),
            trans('cinema.success_store'),
            201
        );
    }


    public function show(Cinema $cinema)
    {
        return CinemaResource::make($cinema->load(['city','sections']));


    }


    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        $cinema->update($request->validated());
        return $this->successResponse(
            CinemaResource::make($cinema),
            trans('cinema.success_store'),
            201
        );

    }

    public function destroy(Request $request, Cinema $cinema)
    {
        $cinema->delete();
        return $this->successResponse(
            CinemaResource::make($cinema),
            trans('cinema.success_store'),
            201
        );
    }

    public function cinemaToMovie(Request $request)
    {
        $cinema_id = $request->input('cinema_id');
        $cinema = Cinema::find($cinema_id);

        $movies = $request->input('movies');
        $cinema->movies()->attach($movies);
//    $cinema->$movies()->detach($movies);
//    $cinema->$movies()->sync($movies);
    }
}
