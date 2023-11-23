<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\BaseApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends BaseApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request): JsonResponse
    {
        $tickets=Ticket::with(['user','section'])->get();
        return $this->successResponse(
            TicketResource::collection($tickets),
        );
    }




    public function store(StoreTicketRequest $request): JsonResponse
    {
        $ticket=Ticket::create($request->validated());
        return $this->successResponse(
            TicketResource::make($ticket),
            trans('ticket.success_store'),
            201
        );
    }


    public function show(Ticket $ticket)
    {
        return TicketResource::make($ticket->load(['user','section']));


    }


    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return $this->successResponse(
            TicketResource::make($ticket),
            trans('ticket.success_store'),
            201
        );

    }
    public function destroy(Request $request,Ticket $ticket){
        $ticket->delete();
        return $this->successResponse(
            TicketResource::make($ticket),
            trans('ticket.success_store'),
            201
        );
    }
}
