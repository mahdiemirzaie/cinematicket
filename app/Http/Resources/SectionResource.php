<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'from' => $this->resource->from,
            'to' => $this->resource->to,
            'cinema' => $this->whenLoaded('cinema', function () {
                return CinemaResource::make($this->resource->cinema);
            }),
            'movie' => $this->whenLoaded('movie', function () {
                return MovieResource::make($this->resource->movie);
            }),
            'tickets' => $this->whenLoaded('tickets', function () {
                return TicketResource::collection($this->resource->tickets);
            }),
        ];
    }
}
