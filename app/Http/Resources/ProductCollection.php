<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * @OA\Schema(
     *     title="ProductCollection", schema="ProductCollection",
     *     @OA\Property(
     *      property="data", type="array",
     *      @OA\Items(ref="#/components/schemas/ProductItemResource")
     *     ),
     * )
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => ProductItemResource::collection($this->collection),
        ];
    }
}
