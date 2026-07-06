<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\OfferController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('client.api')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blogs/{id}', [BlogController::class, 'show']);

    Route::get('/offers', [OfferController::class, 'index']);
    Route::get('/offers/{id}', [OfferController::class, 'show']);
});
