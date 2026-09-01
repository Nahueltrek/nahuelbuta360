<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'cover_image' => $this->cover_image,
            'distance_km' => $this->distance_km,
            'duration_minutes' => $this->duration_minutes,
            'difficulty' => $this->difficulty,
            'points' => $this->whenLoaded('points', fn () => $this->points->map(fn ($point) => [
                'position' => $point->position,
                'type' => $point->pointable_type,
                'note' => $point->note,
                'item' => $point->relationLoaded('pointable') && $point->pointable ? [
                    'id' => $point->pointable->id,
                    'name' => $point->pointable->name,
                    'slug' => $point->pointable->slug,
                ] : null,
            ])),
        ];
    }
}
