<?php

namespace App\Module\Driver\Services;



class DriverService
{
   
    public function show_user_that_is_driver($data) 
    {
        $user = $data->user();

        $user->load('driver');

        return $user;
    }

    public function create_driver($valid)
    {
        $user = $valid->user();
        
        $user->update($valid->only('name'));

        $user->driver()->updateOrCreate($valid->only([
            'year' ,
            'make',
            'model',
            'color',
            'license_plate'
        ]));
        $user->load('driver');

        return $user;
    }
    
}
