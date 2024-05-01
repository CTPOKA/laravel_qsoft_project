<?php

use App\Http\Controllers\Api\CarsController;
use App\Http\Middleware\BasicAuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::apiResource('cars', CarsController::class)->middleware(BasicAuthMiddleware::class);
