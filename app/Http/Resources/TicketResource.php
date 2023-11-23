<?php

namespace App\Http\Resources;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'price' => $this->price,
            'time' => $this->time,
            'user' => $this->whenLoaded('user', function () {
                return UserResource::make($this->resource->user);
            }),
            'section' => $this->whenLoaded('section', function () {
                return SectionResource::make($this->resource->section);
            }),
        ];
    }
}
