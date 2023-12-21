<?php 

namespace App\Arrival\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Arrival\Http\Resources\ArrivalResource;
use App\Arrival\Models\Arrival;
use Event;
use LibUser\Userapi\Http\Resources\UserResource;

class ArrivalController extends Controller 
{
    public function index()
    {
        $data = Arrival::all();
        return ArrivalResource::collection($data);
    }

    public function store()
    {
        $user = auth()->user();

        $arrival = new Arrival;
        $userResource = new UserResource($user);
        $arrival->name = post('name');
        $arrival->user_id = post('user_id', $user->id);
        $arrival->created_at = post('created_at');
        $arrival->save();

        return ['message' => 'Arrival created'];
    }


    public function getUserArrivals()
    {
        $user = auth()->user();
        $userResource = new UserResource($user);
        $arrivals = Arrival::where('user_id', $user->id)->get();
        return ['user' => $userResource, 'arrivals' => $arrivals];
    }

    public function destroy()
    {
        Arrival::truncate();
        Event::fire('arrivals.deleted');
        return ['message' => 'All arrivals deleted'];
    }

}