<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientsController;
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
Route::middleware('auth:sanctum')->group(function () {

});
Route::get('/user', function() {

    return auth()->user();
})->middleware('auth:sanctum');

Route::post('/login', [ClientsController::class, 'create_token']);
Route::post('/sungupp', [ClientsController::class, 'sungupp']);

Route::post('confiramtion/{client}', [ClientsController::class, 'confiramtion']);

Route::post('signature/{client}', [ClientsController::class, 'signature']);

Route::get('contries', function () {
    $contries = App\Models\countries::where('active','1')->get();
    return response()->json(
     $contries

    );


});



Route::get('command', function () {



    \Artisan::call('cache:clear');
    echo \Artisan::output();
    \Artisan::call('config:clear');
    echo \Artisan::output();
    \Artisan::call('route:clear');
    echo \Artisan::output();
    \Artisan::call('route:cache');
    echo \Artisan::output();
    \Artisan::call('config:cache');
    echo \Artisan::output();
    \Artisan::call('view:clear');


    echo \Artisan::output();
    \Artisan::call('migrate');


    echo \Artisan::output();


});
use Twilio\Rest\Client;
use GuzzleHttp\Client as ClientHTTP;
Route::get('sms', function () {


    try{
        $client2 = new ClientHTTP();
        $res = $client2->request('GET', 'https://api.smsala.com/api/SendSMS', [
            'query' => [
                'api_id'=>'API1369934368026',
                'api_password'=>'POGGgMthKO',
                'sms_type'=>'P',
                'encoding'=>'T',
                'sender_id'=>'CRC',
                'phonenumber'=>'97450164060',
                'textmessage'=>'code verification : 1452',
            ],

        ]);
        dd($res->getBody());
    }catch(Exception $exception) {
    dd($exception);
    }

});


