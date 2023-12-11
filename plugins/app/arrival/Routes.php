<?php

use App\Arrival\Models\Arrival;

Route::get('api/kokoti/primitivovia', function () {
    try {
        $data = Arrival::all();

        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['error' => $e -> getMessage()], 500);
    }
});