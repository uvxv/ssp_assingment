<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'product_id' => $this->product_id,
            'admin_id' => $this->admin_id,
            'image_path' => $this->image_path,
            'name' => $this->name,
            'description' => $this->description,
            'price' => (float) $this->price,
            'status' => $this->status,
        ];
    }
}
