<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        if (isset($request['ticket_max'])) {
            $movies = Movie::withCount('tickets')
                ->orderByDesc('tickets_count')
                ->limit(1)
                ->get();
        } else $movies = Movie::with(["category", "sections"])
            ->get();
        return $this->successResponse(
            MovieResource::collection($movies),
        );
    }

    public function store(StoreMovieRequest $request): JsonResponse
    {
        $movie = Movie::create($request->validated());
        return $this->successResponse(
            MovieResource::make($movie),
            trans('movie.success_store'),
            201
        );
    }


    public function show(Request $request, Movie $movie)
    {
        if (isset($request['ticket_count'])) {
            $movie->loadCount("tickets");
        } else {
            return MovieResource::make($movie->load(['category', "sections"]));
        }


    }


    public function update(UpdateMovieRequest $request, Movie $movie): JsonResponse
    {
        $movie->update($request->validated());
        return $this->successResponse(
            MovieResource::make($movie),
            trans('movie.success_store'),
            201
        );

    }

    public function destroy(Request $request, Movie $movie)
    {
        $movie->delete();
        return $this->successResponse(
            MovieResource::make($movie),
            trans('movie.success_store'),
            201
        );
    }

    public function movieToCinema(Request $request)
    {
        $movie_id = $request->input('movie_id');
        $movie = Movie::find($movie_id);
        $cinemas = $request->input('cinemas');
        $movie->cinemas()->attach($cinemas);
//    $movie->$cinemas()->detach($cinemas);
//    $movie->$cinemas()->sync($cinemas);
    }

    public function movieToUser(Request $request)
    {
        $movie_id = $request->input('movie_id');
        $movie = Movie::find($movie_id);
        $users = $request->input('users');
        $movie->users()->attach($users);
//    $movie->$users()->detach($users);
//    $movie->$users()->sync($users);
    }

    public function movieToSection(Request $request)
    {
        $movie_id = $request->input('movie_id');
        $movie = Movie::find($movie_id);
        $sections = $request->input('sections');
        $movie->sections()->attach($sections);
//        $movie->sections()->detach($sections);
//        $movie->sections()->sync($sections);
    }
}
