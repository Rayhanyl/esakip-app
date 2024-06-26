<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PerjanjianKinerjaResource extends JsonResource
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
            'perangkat_daerah' => $this->user->name,
            'sasaran_strategis' => $this->perda_sastra->sasaran,
            'indikator' => $this->indikator,
            'taget' => $this->target1,
        ];
    }
}
