<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post("/registration", [UserController::class, 'register']);
Route::post("/auth", [UserController::class, 'auth']);

