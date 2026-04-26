<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::post("/admin/auth", function (Request $req) {
    $data = $req->validate([
        "email" => "required|email",
        "password" => "required|min:5"
    ]);
    if (Auth::attempt($data)) {
        $user = Auth::user();
        Auth::login($user);
        return redirect("/admin/category-create");
    }
    return back()->withErrors(["auth" => "Invalid credentials"]);
});

Route::get("/", function () {
    return view("index");
});


Route::prefix("/admin")->middleware('admin')->group(function () {

    Route::get("/category-create", [CategoryController::class, 'create']);
    Route::get("/category-edit/{category}", [CategoryController::class, 'edit']);
    Route::get("/category-view/{category}", [CategoryController::class, 'show']);
    Route::get("/categories", [CategoryController::class, 'index']);

    Route::get("/product-create", [GoodController::class, 'create']);
    Route::get("/product-edit/{product}", [GoodController::class, 'edit']);
    Route::get("/product-view/{product}", [GoodController::class, 'show']);
    Route::get("/products", [GoodController::class, 'index']);

    Route::post("/category", [CategoryController::class, "store"]);
    Route::patch("/category/{category}", [CategoryController::class, 'update']);

    Route::post("/product", [GoodController::class, 'store']);
    Route::patch("/product/{product}", [GoodController::class, 'update']);
    Route::delete("/product/{product}", [GoodController::class, 'destroy']);

    Route::get("/orders", [OrderController::class, 'index']);

    Route::post("/logout", function (Request $req) {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect("/");
    });
});
