<?php

use App\Arrival\Models\Arrival;

Route::get('api/arrivals/users', function () {
    try {
        $data = Arrival::all();

        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::post('api/custom/arrival', function () {
    try {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'created_at' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $arrival = new Arrival;
        $arrival->setAttribute('name', $data['name']);
        $arrival->setAttribute('created_at', $data['created_at']);
        $arrival->save();

        return response()->json(['message' => 'Arrival created']);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json(['validation_errors' => $e->validator->errors()], 422);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

