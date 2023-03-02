<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductItemResource extends JsonResource
{
    /**
     * @OA\Schema(title="ProductItemResource", schema="ProductItemResource",
     *  @OA\Property(property="id", type="integer", example="ProductId"),
     *  @OA\Property(property="name", type="string", example="ProductName"),
     *  @OA\Property(property="price", type="integer", example="ProductPrice"),
     *  @OA\Property(property="quantity", type="integer", example="ProductQuantity"),
     *  @OA\Property(property="properties", type="string", example="ProductProperties"),
     *   ),
     * )
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'price'      => $this->price,
            'quantity'   => $this->quantity,
            'properties' => $this->properties,
        ];
    }
}
