<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'address' => $this->address,
            'category' => $this->whenLoaded('category', fn () => [
                'name' => $this->category->name,
                'slug' => $this->category->slug,
                'map_layer' => $this->category->map_layer,
            ]),
            'commune' => $this->whenLoaded('commune', fn () => $this->commune->name),
            // Solo presentes cuando la query usó ->withCoordinates() (ver
            // App\Models\Concerns\HasGeoLocation) — si no, quedan ausentes
            // en vez de null, para que el frontend note la diferencia.
            'latitude' => $this->when(isset($this->latitude), fn () => (float) $this->latitude),
            'longitude' => $this->when(isset($this->longitude), fn () => (float) $this->longitude),
            'distance_m' => $this->when(isset($this->distance_m), fn () => round((float) $this->distance_m)),
            'sernatur_status' => $this->sernatur_status,
            'verification_status' => $this->verification_status,
            'claim_status' => $this->claim_status,
            'opening_hours' => $this->opening_hours,
            'contacts' => $this->whenLoaded('contacts'),
            'socials' => $this->whenLoaded('socials'),
            'services' => $this->whenLoaded('services'),
        ];
    }
}
