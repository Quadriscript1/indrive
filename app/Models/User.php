<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Module\Driver\Models\Driver;
use App\Module\Trips\Models\Trip;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'login_code',
        'remember_token',
    ];

    public function routeNotificationForTwilio()
{
    return $this->phone; // Replace 'phone_number' with the actual attribute name storing the phone number
}

    public function driver(){
        return $this->hasOne(Driver::class);
    }

    public function trips(){
        return $this->hasMany(Trip::class);
    }

    
}
