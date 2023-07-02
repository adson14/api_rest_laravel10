<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExpenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->load('user');//Carregar a relação
        return [
            'id' => $this->id,
            'description' => $this->description,
            'date_expense' => $this->date_expense,
            'value' => $this->value,
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
