<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix("/admin")->group(function () {

    Route::get("/category-create", [CategoryController::class, 'create']);
    Route::get("/category-edit/{category}", [CategoryController::class, 'edit']);
    Route::get("/category-view/{category}", [CategoryController::class, 'show']);

    Route::get("/product-create", [GoodController::class, 'create']);
    Route::get("/product-edit/{product}", [GoodController::class, 'edit']);
    Route::get("/product-view/{product}", [GoodController::class, 'show']);
    Route::get("/products", [GoodController::class, 'index']);

    Route::post("/category", [CategoryController::class, "store"]);
    Route::patch("/category/{category}", [CategoryController::class, 'update']);

    Route::post("/product", [GoodController::class, 'store']);
    Route::patch("/product/{product}", [GoodController::class, 'update']);
});
