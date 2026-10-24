<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'price'       => (int) $this->price,
            'duration'    => $this->duration_minutes . ' мин',
            'is_active'   => (bool) $this->is_active,
            'image'       => $this->image_url,
            'master'      => new MasterResource($this->whenLoaded('master')),
            'created_at'  => $this->created_at?->toIso8601String(),
            'links'       => [
                'self' => route('api.v1.services.show', $this->id),
            ],
        ];
    }
}