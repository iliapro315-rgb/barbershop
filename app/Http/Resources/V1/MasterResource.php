<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MasterResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'specialization' => $this->specialization,
            'experience'     => $this->experience_years . ' лет',
            'services_count' => $this->whenCounted('services'),
        ];
    }
}