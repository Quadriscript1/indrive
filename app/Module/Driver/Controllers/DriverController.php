<?php

namespace App\Module\Driver\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Module\Driver\Requests\DriverRequest;
use App\Module\Driver\Services\DriverService;

class DriverController extends Controller
{
    //

    public function show(Request $req)
    {
         return (new DriverService)->show_user_that_is_driver($req);
       
    }

    public function create(DriverRequest $req)
    {
        return (new DriverService)->create_driver($req);
       
    }
}
