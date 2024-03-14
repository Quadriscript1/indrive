<?php

namespace App\Module\Driver\Models;

use App\Models\User;
use App\Module\Trips\Models\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;


    protected $guarded =[];



    public function user(){
        return $this->belongsTo(User::class);
    }


    
    public function trips(){
        return $this->hasMany(Trip::class);
    }

}
