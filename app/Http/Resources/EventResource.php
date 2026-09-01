<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'cover_image' => $this->cover_image,
            'starts_at' => $this->starts_at?->toIso8601String(),
            'ends_at' => $this->ends_at?->toIso8601String(),
            'business' => $this->whenLoaded('business', fn () => $this->business?->name),
            'latitude' => $this->when(isset($this->latitude), fn () => (float) $this->latitude),
            'longitude' => $this->when(isset($this->longitude), fn () => (float) $this->longitude),
        ];
    }
}
