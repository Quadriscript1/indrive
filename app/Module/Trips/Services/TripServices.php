<?php

namespace App\Module\Trips\Services;

use App\Events\TripEnded;
use App\Events\TripStarted;
use App\Events\TripAccepted;
use App\Module\Trips\Models\Trip;
use App\Events\TripLocationUpdated;



class TripServices
{
    public function create_trip($data)
    {
        $user = $data->user()->trips();
    
        $attributes = $data->only(['destination_name']);
        $attributes['origin'] = json_encode($data->get('origin'));
        $attributes['destination'] = json_encode($data->get('destination'));
    
        return $user->updateOrCreate($attributes);
    }

   public function show_trip($data,$trip)
   {
        if($trip->user->id === $data->user()->id)
        {
            return $trip;
        }

        if($trip->driver && $data->user()->driver)
        {
                if($trip->driver->id === $data->user()->driver->id)
            {
                return $trip;
            }
        }
        return response()->json(['message' => 'Cannot find this trip.'],404);
   }
    
   public function accept_trip($data, $trip)
   {
        $data->validate([
            'driver_location' => 'required'
        ]);
        $trip->update([
            'driver_id' => $data->user()->id,
            'driver_location' => $data->driver_location
        ]);
        $trip->load('driver.user');

        TripAccepted::dispatch($trip,$data->user());
        
        return $trip;
   }

   public function start_trip($data, $trip)
   {
        $data->validate([
            'is_started' => 'required|boolean',
        ]);
        $newIsStartedValue = !$trip->is_started;
        $trip->update($data->only([
            'is_started' => $newIsStartedValue
        ]));
        
        $trip->load('driver.user');
        
        TripStarted::dispatch($trip,$data->user());
        return $trip;
   }

   public function end_trip($data, $trip)
   {
        $data->validate([
            'is_completed' => 'required'
        ]);
        $trip->update($data->only([
            'is_completed' => true
        ]));
        $trip->load('driver.user');

        TripEnded::dispatch($trip,$data->user());
        
        return $trip;
   }

   public function location($data, $trip)
   {
        $trip->update($data->only([
            'driver_location' => $data->driver_location
        ]));

        $trip->load('driver.user');

        TripLocationUpdated::dispatch($trip,$data->user());
        
        return $trip;
   }
    
}
