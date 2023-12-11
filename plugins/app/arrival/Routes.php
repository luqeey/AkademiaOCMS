<?php

Route::group(['prefix' => 'api'], function () {
    Route::get('kokoti/primitivovia', 'App\Arrival\Controllers\Arrivals@apiMethod');
});