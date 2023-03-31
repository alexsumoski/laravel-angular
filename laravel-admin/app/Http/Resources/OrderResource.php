<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'first_name' => $this->id,
            'last_name' => $this->id,
            'email' => $this->id,
            'order_items' => OrderItemResource::collection($this->whenLoaded('orderItems'))
        ];
    }
}
