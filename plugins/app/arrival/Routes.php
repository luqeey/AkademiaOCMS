<?php
use App\Arrival\Http\Controllers\ArrivalController;
use App\Arrival\Http\Middlewares\ArrivalMiddleware;

Route::get('api/arrivals/users', [ArrivalController::class, 'index']);
Route::post('api/custom/arrival', [ArrivalController::class, 'store']);
Route::middleware([ArrivalMiddleware::class])->get('/user/arrivals', [ArrivalController::class, 'getUserArrivals']);



