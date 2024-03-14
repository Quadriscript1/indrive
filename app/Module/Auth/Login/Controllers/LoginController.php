<?php

namespace App\Module\Auth\Login\Controllers;

use App\Http\Controllers\Controller;
use App\Module\Auth\Login\Requests\LoginRequest;
use App\Module\Auth\Login\Services\LoginService;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function Submit(LoginRequest $data)
    {
        return (new LoginService)->Create($data->validated());
    }
    
    public function Verify(LoginRequest $data)
    {
        return (new LoginService)->Verify($data->validated());    
    }
}
