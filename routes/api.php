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
    return response()->json([
        'contries' => $contries

    ]);


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

Route::get('sms', function () {



    $sid    = "ACf169e8f69b9fe6f3fd803569612a0692";
    $token  = "858882cbb8a43eaf88c38152d952593c";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+21656818880", // to
        array(
            "from" => "+19852484364",
          "body" => 'test taw'

        )
      );


});

