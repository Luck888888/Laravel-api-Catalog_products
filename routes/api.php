<?php

use App\Http\Controllers\Api\v1\AuthenticationApiController;
use App\Http\Controllers\Api\v1\ProductApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::post("register", [AuthenticationApiController::class, "store"]);
    Route::post("login", [AuthenticationApiController::class, "get"]);
    Route::post("logout", [AuthenticationApiController::class, "destroy"])->middleware(['auth:sanctum']);

    Route::post("product", [ProductApiController::class, "store"])->middleware(['auth:sanctum']);
    Route::get("products", [ProductApiController::class, "index"])->middleware(['auth:sanctum']);
});
