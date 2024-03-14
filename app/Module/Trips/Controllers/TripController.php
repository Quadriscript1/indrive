<?php

namespace App\Module\Trips\Controllers;

use Illuminate\Http\Request;
use App\Module\Trips\Models\Trip;
use App\Http\Controllers\Controller;
use App\Module\Trips\Requests\TripRequests;
use App\Module\Trips\Services\TripServices;

class TripController extends Controller
{
    // 
    public function create(TripRequests $req)
    {   
         return (new TripServices)->create_trip($req);
    }



    public function show(TripRequests $req, Trip $trip)
    {
        return(new TripServices)->show_trip($req,$trip);
    }


    public function accept(Request $req, Trip $trip)
    {
        return(new TripServices)->accept_trip($req,$trip);
    }


    public function start(Request $req, Trip $trip)
    {
        return(new TripServices)->start_trip($req,$trip);
    }


    public function end(Request $req, Trip $trip)
    {
        return(new TripServices)->end_trip($req,$trip);
    }


    public function location(Request $req, Trip $trip)
    {
        return(new TripServices)->location($req,$trip);
    }
}
