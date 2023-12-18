<?php 

namespace App\Arrival\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Arrival\Http\Resources\ArrivalResource;
use App\Arrival\Models\Arrival;

class ArrivalController extends Controller 
{
    public function index()
    {
        try {
            $data = Arrival::all();
            return response()->json(ArrivalResource::collection($data));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store()
    {
        try {
            $user = auth()->user();

            $data = request()->validate([
                'name' => 'required|string|max:255',
                'user_id' => 'required',
                'created_at' => 'required|date_format:Y-m-d H:i:s',
            ]);

            $arrival = new Arrival;
            $arrival->setAttribute('name', $data['name']);
            $arrival->setAttribute('user_id', $data['user_id']);
            $arrival->setAttribute('created_at', $data['created_at']);
            $arrival->save();

            return response()->json(['message' => 'Arrival created']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['validation_errors' => $e->validator->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getUserArrivals()
    {
        try {
            $user = auth()->user();
            $arrivals = Arrival::where('user_id', $user->id)->get();

            return response()->json(['arrivals' => $arrivals]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}