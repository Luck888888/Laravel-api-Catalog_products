<?php

namespace App\Http\Requests;

use App\DTO\ProductFiltersDto;
use Illuminate\Foundation\Http\FormRequest;

class GetProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function rules(): array
    {
        $allowed_filter_fields = get_product_allowed_filter_fields(true);

        return [
            'filters'              => 'sometimes|array:' . $allowed_filter_fields,
            'filters.*'            => 'required',
            'filters.properties'   => 'sometimes|array',
            'filters.properties.*' => 'required',
            'filters.name'         => 'sometimes|string',
            'filters.price'        => 'sometimes|numeric',
            'filters.quantity'     => 'sometimes|integer',
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
    public function getProductFiltersDto(): ProductFiltersDto
    {
        return new ProductFiltersDto($this->validated());
    }


}
