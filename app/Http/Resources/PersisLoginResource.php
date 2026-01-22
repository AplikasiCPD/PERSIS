<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersisLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'staff_id' => $this->staff_id,
            'user_level' => $this->user_level,
            'info_level' => $this->info_level,
            'staff' => $this->whenLoaded('staff'),
        ];
    }
}
