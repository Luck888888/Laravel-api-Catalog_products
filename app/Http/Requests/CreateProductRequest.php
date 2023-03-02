<?php

namespace App\Http\Requests;

use App\DTO\ProductDto;
use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    /**
     * @OA\RequestBody(
     *     request="CreateProductRequest", required=true,
     *     description="Create product.",
     *     @OA\MediaType(
     *         mediaType="application/x-www-form-urlencoded",
     *         @OA\Schema(
     *              type="object",
     *              @OA\Property(
     *                  property="name", type="string", example="ProductName",
     *                  description="The product name."
     *              ),
     *           @OA\Property(
     *                  property="price", type="integer", example="ProductPrice",
     *                  description="The product price."
     *              ),
     *            @OA\Property(
     *                  property="quantity", type="integer", example="ProductQuantity",
     *                  description="The product quantity."
     *              ),
     *              required={"name","price","quantity"}
     *         )
     *     )
     * )
     *
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|string',
            'price'      => 'required|numeric',
            'quantity'   => 'required|integer',
            'properties' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     *  @return \App\DTO\ProductFiltersDto
     */
    public function getProductDto(): ProductDto
    {
        return new ProductDto($this->validated());
    }
}
