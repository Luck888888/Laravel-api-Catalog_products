<?php

namespace App\Services;

use App\DTO\ProductDto;
use App\DTO\ProductFiltersDto;
use App\Models\Product;
use Closure;
use ErrorException;

class ProductService
{

    private ?Closure $resource_query_closure = null;

    /**
     * @param \App\DTO\ProductDto $product_dto
     *
     * @return mixed
     * @throws \ErrorException
     */
    public function create(ProductDto $product_dto)
    {
        $product = Product::create($product_dto->toArray());

        if (!$product) {
            throw new ErrorException('Product create error.');
        }

        return $product->refresh();
    }


    /**
     * @param \App\DTO\ProductFiltersDto $filters_dto
     *
     *  @return mixed
     */
    public function getAll(ProductFiltersDto $filters_dto)
    {
        $product = Product::query();

        if ($this->resource_query_closure) {
            $closure = $this->resource_query_closure;
            $product = $closure($product);
        }
        if ($filters_dto->getFilters()) {
            foreach ($filters_dto->getFilters() as $key => $value) {
                switch ($key) {
                    case 'name':
                        $product->where("name", $value);
                        break;
                    case 'price':
                        $product->where("price", $value);
                        break;
                    case 'quantity':
                        $product->where("quantity", $value);
                        break;
                    case 'properties':
                        $product->whereJsonContains("properties", $value);
                        break;
                }
            }
        }
        return $product->paginate(40);

    }



}
