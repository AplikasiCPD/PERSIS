<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CawanganResource extends JsonResource
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
            'kod_caw' => $this->kod_caw,
            'info_caw' => $this->info_caw,
            'kod_bhgn' => $this->kod_bhgn,
            'bahagian' => $this->whenLoaded('bahagian'),
        ];
    }
}
