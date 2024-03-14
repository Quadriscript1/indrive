<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Module\Auth\Login\Controllers\LoginController;
use App\Module\Driver\Controllers\DriverController;
use App\Module\Trips\Controllers\TripController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/login',[LoginController::class,'Submit']);
Route::post('/verify',[LoginController::class,'Verify']);


Route::group(["middleware" => "auth:sanctum"],function(){

    Route::get('/driver',[DriverController::class,'show']);
    Route::post('/driver',[DriverController::class,'create']);

    Route::post('/trip',[TripController::class,'create']);
    Route::get('/trip/{trip}',[TripController::class,'show']);
    Route::post('/trip/{trip}/accept',[TripController::class,'accept']);
    Route::post('/trip/{trip}/start',[TripController::class,'start']);
    Route::post('/trip/{trip}/end',[TripController::class,'end']);
    Route::post('/trip/{trip}/location',[TripController::class,'location']);
    
    Route::get('/user',function(Request $req){
        return $req->user();
    });
});
