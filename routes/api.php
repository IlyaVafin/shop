<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/registration", [UserController::class, 'register']);
Route::post("/auth", [UserController::class, 'auth']);
Route::middleware('bearer')->group(function () {
    Route::get("/categories", [CategoryController::class, 'getCategories']);
    Route::get("/categories/{category}/products", [CategoryController::class, 'getCategoryGoods']);
    Route::get("/products/{product}", [GoodController::class, 'getGood']);
});
