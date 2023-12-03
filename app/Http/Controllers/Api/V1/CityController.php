<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        if (isset($request['ticket_max'])) {
            $cities = City::join('cinemas', 'cities.id', '=', 'cinemas.city_id')
                ->join('sections', 'cinemas.id', '=', 'sections.cinema_id')
                ->join('tickets', 'sections.id', '=', 'tickets.section_id')
                ->select('cities.name')
                ->selectRaw('COUNT(tickets.id) as count_ticket')
                ->groupBy('cities.id', 'cities.name')
                ->orderByDesc('count_ticket')
                ->limit(1)
                ->get();

        } else$cities = City::all();
        return $cities;
    }


    public function store(StoreCityRequest $request)
    {
        $cities = City::create($request->validated());
        return $this->successResponse(
            CityResource::make($cities),
            trans('city.success_store'),
            201
        );
    }


    public function show(City $city)
    {
        return CityResource::make($city);


    }


    public
    function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        return $this->successResponse(
            CityResource::make($city),
            trans('city.success_update'),
            201
        );

    }

    public
    function destroy(Request $request, City $city)
    {
        $city->delete();
        return $this->successResponse(
            CityResource::make($city),
            trans('city.success_delete'),
            201
        );
    }
    public function restore(City $city)
    {
        $city->restore();
    }
}
