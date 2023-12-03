<?php

namespace App\Http\Resources;

use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'minute' => $this->minute,
            'description'=>$this->description,
            'category' => $this->whenLoaded('category', function () {
                return CategoryResource::make($this->category);
            }),
            'sections' => $this->whenLoaded('sections', function () {
                return SectionResource::collection($this->resource->sections);
            }),
            'ticket_count' => $this->whenCounted('tickets'),
        ];
    }
}
