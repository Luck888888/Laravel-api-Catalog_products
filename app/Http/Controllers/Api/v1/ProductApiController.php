<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\GetProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductItemResource;
use App\Http\Traits\ResultTrait;
use App\Services\ProductService;

class ProductApiController extends Controller
{
    use ResultTrait;
    /**
     * @OA\Post(
     *     path="/product",
     *     summary="Create product",
     *     description="Create product",
     *     tags={"Products"},
     *     security={
     *     {"bearerAuth": {}}
     *     },
     *   @OA\Parameter(
     *      name="properties", in="query", required=false,
     *      description="Properties of product",
     *      style="deepObject",
     *      @OA\Schema(type="object", example="{'color':'red','weight':'120'}"),
     *  ),
     *     requestBody={"$ref": "#/components/requestBodies/CreateProductRequest"},
     *     @OA\Response(
     *         response=200,
     *         description="OK",
     *         @OA\JsonContent(
     *             @OA\Examples(example="result", value={"success": true}, summary="An result object."),
     *             @OA\Examples(example="bool", value=false, summary="A boolean value."),
     *         )
     *     )
     * )
     */

    public function store(CreateProductRequest $request, ProductService $service)
    {
        $product = $service->create($request->getProductDto());

        return $this->sendResponse(
            __("auth.create_product"),
            new ProductItemResource($product)
        );
    }

    /**
     * @OA\Get(
     *     path="/products",
     *     summary="List products",
     *     description="List products",
     *     tags={"Products"},
     *     security={
     *     {"bearerAuth": {}}
     *     },
     *
     *   @OA\Parameter(
     *      name="filters", in="query", required=false,
     *      style="deepObject",
     *      @OA\Schema(type="object", example="{'color':'red'}"),
     *  ),
     *     @OA\Response(
     *         response="200",
     *         description="OK"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Нет доступа"
     *     )
     * )
     */

    public function index(GetProductRequest $request, ProductService $service)
    {
        $products = $service->getAll($request->getProductFiltersDto());

        return $this->sendResponse(
            __("auth.get_product"),
            new ProductCollection($products)
        );
    }


}
