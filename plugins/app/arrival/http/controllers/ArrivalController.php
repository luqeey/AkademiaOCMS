<?php 

namespace App\Arrival\Http\Controllers;

use App\Arrival\Controllers\Arrivals;
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
        $arrival->name = post('name');
        $arrival->user_id = $user->id;
        $arrival->created_at = post('created_at');
        $arrival->save();

        return ArrivalResource::make($arrival);
    }


    public function getUserArrivals()
    {
        $user = auth()->user();
        $userResource = new UserResource($user);
        $arrivals = Arrival::where('user_id', $user->id)->get();

        return ArrivalResource::collection($arrivals, $userResource);
    }

    public function destroy($key)
    {
        $arrival = Arrival::find($key);
        if(!$arrival) {
            return ['message' => 'Arrival not found'];
        }
        $arrival->delete();
        Event::fire('arrivals.deleted');

        return ['message' => 'Arrival was deleted'];
    }

}