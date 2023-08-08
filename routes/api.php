<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ClientsController;
use App\Http\Controllers\Api\ImportationsController;
use App\Http\Controllers\Api\BacksController;
use App\Http\Controllers\Api\ExportsController;
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

    Route::group([
        'prefix' => 'importations',
    ], function () {
        Route::get('/', [ImportationsController::class, 'index'])
             ->name('api.importations.importations.index');
        Route::get('/show/{importations}',[ImportationsController::class, 'show'])
             ->name('api.importations.importations.show')->where('id', '[0-9]+');
        Route::post('/', [ImportationsController::class, 'store'])
             ->name('api.importations.importations.store');
        Route::put('importations/{importations}', [ImportationsController::class, 'update'])
             ->name('api.importations.importations.update')->where('id', '[0-9]+');
        Route::delete('/importations/{importations}',[ImportationsController::class, 'destroy'])
             ->name('api.importations.importations.destroy')->where('id', '[0-9]+');
    });


    Route::group([
        'prefix' => 'exports',
    ], function () {
        Route::get('/', [ExportsController::class, 'index'])
             ->name('api.exports.export.index');
        Route::get('/show/{export}',[ExportsController::class, 'show'])
             ->name('api.exports.export.show')->where('id', '[0-9]+');
        Route::post('/', [ExportsController::class, 'store'])
             ->name('api.exports.export.store');
        Route::put('export/{export}', [ExportsController::class, 'update'])
             ->name('api.exports.export.update')->where('id', '[0-9]+');
        Route::delete('/export/{export}',[ExportsController::class, 'destroy'])
             ->name('api.exports.export.destroy')->where('id', '[0-9]+');
    });


    Route::group([
        'prefix' => 'backs',
    ], function () {
        Route::get('/', [BacksController::class, 'index'])
             ->name('api.backs.back.index');
        Route::get('/show/{back}',[BacksController::class, 'show'])
             ->name('api.backs.back.show')->where('id', '[0-9]+');
        Route::post('/', [BacksController::class, 'store'])
             ->name('api.backs.back.store');
        Route::put('back/{back}', [BacksController::class, 'update'])
             ->name('api.backs.back.update')->where('id', '[0-9]+');
        Route::delete('/back/{back}',[BacksController::class, 'destroy'])
             ->name('api.backs.back.destroy')->where('id', '[0-9]+');
    });






});
Route::get('/user', function() {

    return auth()->user();
})->middleware('auth:sanctum');




Route::get('/term', [ClientsController::class, 'term']);

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
                'phonenumber'=>'21656818880',
                'textmessage'=>'code verification : 1452',
            ],

        ]);
        dd($res->getBody());
    }catch(Exception $exception) {
    dd($exception);
    }

});





