<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CinemaResource extends JsonResource
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
            'name'=>$this->name,
            'address'=>$this->address,
            'capacity'=>$this->capacity,
            'city'=>$this->whenLoaded('city',function (){
                return CityResource::make($this->resource->city);
            }),
            'sections'=>$this->whenLoaded('sections',function (){
                return SectionResource::collection($this->resource->sections);
            }),
            'ticket_max' => $this->whenCounted('tickets'),

        ];
    }
}
