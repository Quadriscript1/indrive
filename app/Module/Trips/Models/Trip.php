<?php

namespace App\Module\Trips\Models;

use App\Models\User;
use App\Module\Driver\Models\Driver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trip extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $cast =[
        'origin' => 'array',
        'destination'=>'array'
        
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }


    public function driver(){
        return $this->belongsTo(Driver::class);
    }

}
