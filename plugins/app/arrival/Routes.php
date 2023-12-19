<?php
use App\Arrival\Http\Controllers\ArrivalController;
use LibUser\Userapi\Models\User;

Route::middleware(['auth'])->group(function() 
{
    Route::get('api/arrivals/users', [ArrivalController::class, 'index']);
    Route::post('api/custom/arrival', [ArrivalController::class, 'store']);
    Route::delete('api/delete/arrivals', [ArrivalController::class, 'destroy']);
    Route::get('api/custom/arrival', [ArrivalController::class, 'getUserArrivals']);

});




