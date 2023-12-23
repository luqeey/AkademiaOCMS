<?php
use App\Arrival\Http\Controllers\ArrivalController;
use LibUser\Userapi\Models\User;

Route::prefix('api/v1')->group(function() 
{
    Route::middleware(['auth'])->group(function() 
    {
        Route::get('users', [ArrivalController::class, 'index']);
        Route::post('arrival', [ArrivalController::class, 'store']);
        Route::delete('arrival/{key}', [ArrivalController::class, 'destroy']);
        Route::get('arrival', [ArrivalController::class, 'getUserArrivals']);

    });
});





