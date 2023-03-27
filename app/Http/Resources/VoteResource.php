<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'VOT_DATE' => $this->VOT_DATE,
            'selection_id' => $this->selection_id,
            'user_id' => $this->user_id,
        ];
    }
}
