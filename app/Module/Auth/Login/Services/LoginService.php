<?php

namespace App\Module\Auth\Login\Services;

use App\Models\User;
use App\Notifications\LoginNeedVerification;

class LoginService
{
    public function Create($data){
        $user = User::firstorCreate([
            "phone" => $data['phone']
        ]);
        if(!$user){
            return response()->json(['message'=>'Could not Process with a user without Phone Number']);
        }
        $user->notify(new LoginNeedVerification());

        return response()->json(['message'=>'Text message notification sent.']);

    }

    public function Verify($data){
        $user =User::where('phone',$data['phone'])
        ->where('login_code',$data['login_code'])
        ->first();

        if($user){
            $user->update([
                'login_code'=>null
            ]);
            return $user->createToken($data['login_code'])->plainTextToken;
        }

        return response()->json(['message'=>'Invalid Verification Code',401]);
    }
    
    
}
