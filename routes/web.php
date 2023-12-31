
<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\ClientsController;
use Illuminate\Http\Request;
use App\Http\Controllers\AcceptationClientsController;
use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ANIMALINFOsController;
use App\Http\Controllers\ImportationsController;
use App\Http\Controllers\BacksController;
use App\Http\Controllers\ExportsController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SettingsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Models\Client;
use App\Models\countries;
use App\SMS\Sms;

use App\Http\Controllers\LogController;
// Show log content
Route::get('/log', [LogController::class, 'showLogs'])->name('logs.show');

// Delete log files
Route::delete('/log', [LogController::class, 'deleteLogs'])->name('logs.delete');


Route::get('/privacy', function () {
    return view('privacy');
})->name('/privacy');
use Symfony\Component\HttpFoundation\Response;


Route::get('/test', function () {
    $client = Client::findOrFail('1');
    $term = \App\Models\term::first();
    $client->term_ar = $term->Conditionar;

    $data =        $client->toArray();
//dd($data);
// view()->share('data', $data);
// return view('test');
//  $pdf = Pdf::loadView('test',['data' => $data] );

$reportHtml = view('test',['data' => $data] )->render();

        $arabic = new \ArPHP\I18N\Arabic();
        $p = $arabic->arIdentify($reportHtml);

        for ($i = count($p)-1; $i >= 0; $i-=2) {
            $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
            $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);

        }

        $pdf = PDF::loadHTML($reportHtml);
 $fileName = $client->ud . '.pdf';

 // Return the response

 $pdf->save(public_path('pdf/' . $fileName));

    return  asset('pdf/' . $fileName) ;

        return $pdf;
    })->name('/test');




Route::get('/', function () {

if(auth()->guard('clientt')->check()){
return redirect()->route('importations.client.index');
}
if(auth()->guard()->check()){
    return redirect()->route('home');
    }

    return view('login');
})->name('/');


Route::get('/term', function (Request $request) {
   $id = $request->id;
if($id){
    return view('term',compact('id'));
}else{
return back();
}



})->name('term');

Route::get('/sms', function (Request $request) {
 return view('sms');
 })->name('sms');



 Route::post('/sendsms', function (Request $request) {

    try {
        $sms = new Sms;
    $sms->send($request->phone,$request->message);
    } catch (\Throwable $th) {
       dd($th);
    }

    return back();

    })->name('sendsms');




    Route::post('/sendsmscountries', function (Request $request) {

        foreach ($request->countries as $key => $countryid) {

           $users = Client::where('contry_id',$countryid)->get();
           $country = countries::find($countryid);
           foreach ($users as $key => $user) {
            try {
                $sms = new Sms;
            $sms->send($country->phonecode.$user->phone,$request->message);
            } catch (\Throwable $th) {
               dd($th);
            }
            # code...
           }
        }


        return back();

        })->name('sendsmscountries');


Route::get('/confiramtion', function (Request $request) {
    $id = $request->id;

    $client = App\Models\Client::find($id);
    $contry = App\Models\countries::find($client->contry_id );

    $code = mt_rand(1111,9999);
    $client->code = $code;
    $client->save();
    try {
        $sms = new Sms;
    $sms->send($contry->phonecode.$client->phone,"Hello your code :  ".$code);
    } catch (\Throwable $th) {
       dd($th);
    }
   return view('confiramtion',compact('id'));
 })->name('confiramtion');

Route::get('/singup', function () {
    return view('register');
});

Auth::routes();
Route::get('getpdf/{id}', [App\Http\Controllers\ClientsController::class, 'pdf'])->name('getpdf');




Route::group([  'middleware' => 'clientAuth'], function()
{
    //All the routes that belongs to the group goes here

    Route::get('/client/home', [App\Http\Controllers\HomeClientController::class, 'index'])->name('client.home');







Route::group([
    'prefix' => 'client',
], function () {


    Route::group([
        'prefix' => 'exports',
    ], function () {
        Route::get('/', [ExportsController::class, 'indexclient'])
             ->name('exports.client.index');
        Route::get('/create', [ExportsController::class, 'createclient'])
             ->name('exports.client.create');
        Route::get('/show/{export}',[ExportsController::class, 'showclient'])
             ->name('exports.client.show')->where('id', '[0-9]+');
        Route::get('/{export}/edit',[ExportsController::class, 'editclient'])
             ->name('exports.client.edit')->where('id', '[0-9]+');
        Route::post('/', [ExportsController::class, 'storeclient'])
             ->name('exports.client.store');
        Route::put('export/{export}', [ExportsController::class, 'updateclient'])
             ->name('exports.client.update')->where('id', '[0-9]+');
        Route::delete('/export/{export}',[ExportsController::class, 'destroyclient'])
             ->name('exports.client.destroy')->where('id', '[0-9]+');
    });




Route::group([
    'prefix' => 'importations',
], function () {
    Route::get('/', [ImportationsController::class, 'indexclient'])
         ->name('importations.client.index');

    Route::get('/create', [ImportationsController::class, 'createclient'])
         ->name('importations.client.create');
    Route::get('/show/{importation}',[ImportationsController::class, 'showclient'])
         ->name('importations.client.show')->where('id', '[0-9]+');
    Route::get('/{importation}/edit',[ImportationsController::class, 'editclient'])
         ->name('importations.client.edit')->where('id', '[0-9]+');
    Route::post('/', [ImportationsController::class, 'storeclient'])
         ->name('importations.client.store');
    Route::put('importation/{importation}', [ImportationsController::class, 'updateclient'])
         ->name('importations.client.update')->where('id', '[0-9]+');
    Route::delete('/importation/{importation}',[ImportationsController::class, 'destroyclient'])
         ->name('importations.client.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'importationsafter',
], function () {
    Route::get('/', [ImportationsController::class, 'indexclientafter'])
         ->name('importations.after.client.index');

    Route::get('/create', [ImportationsController::class, 'createclientafter'])
         ->name('importations.after.client.create');

});


Route::group([
    'prefix' => 'exportsafter',
], function () {
    Route::get('/', [ExportsController::class, 'indexclientafter'])
         ->name('exports.after.client.index');
    Route::get('/create', [ExportsController::class, 'createclientafter'])
         ->name('exports.after.client.create');

});


});




});








Route::group([  'middleware' => 'auth'], function()
{
    //All the routes that belongs to the group goes here
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'acceptation_clients',
], function () {
    Route::get('/', [AcceptationClientsController::class, 'index'])
         ->name('acceptation_clients.acceptation_client.index');
    Route::get('/create', [AcceptationClientsController::class, 'create'])
         ->name('acceptation_clients.acceptation_client.create');
    Route::get('/show/{acceptationClient}',[AcceptationClientsController::class, 'show'])
         ->name('acceptation_clients.acceptation_client.show')->where('id', '[0-9]+');
    Route::get('/{acceptationClient}/edit',[AcceptationClientsController::class, 'edit'])
         ->name('acceptation_clients.acceptation_client.edit')->where('id', '[0-9]+');
    Route::post('/', [AcceptationClientsController::class, 'store'])
         ->name('acceptation_clients.acceptation_client.store');
    Route::put('acceptation_client/{acceptationClient}', [AcceptationClientsController::class, 'update'])
         ->name('acceptation_clients.acceptation_client.update')->where('id', '[0-9]+');
    Route::delete('/acceptation_client/{acceptationClient}',[AcceptationClientsController::class, 'destroy'])
         ->name('acceptation_clients.acceptation_client.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'api_users',
], function () {
    Route::get('/', [ApiUsersController::class, 'index'])
         ->name('api_users.api_user.index');
    Route::get('/create', [ApiUsersController::class, 'create'])
         ->name('api_users.api_user.create');
    Route::get('/show/{apiUser}',[ApiUsersController::class, 'show'])
         ->name('api_users.api_user.show')->where('id', '[0-9]+');
    Route::get('/{apiUser}/edit',[ApiUsersController::class, 'edit'])
         ->name('api_users.api_user.edit')->where('id', '[0-9]+');
    Route::post('/', [ApiUsersController::class, 'store'])
         ->name('api_users.api_user.store');
    Route::put('api_user/{apiUser}', [ApiUsersController::class, 'update'])
         ->name('api_users.api_user.update')->where('id', '[0-9]+');
    Route::delete('/api_user/{apiUser}',[ApiUsersController::class, 'destroy'])
         ->name('api_users.api_user.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'a_n_i_m_a_l__i_n_f_os',
], function () {
    Route::get('/', [ANIMALINFOsController::class, 'index'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.index');
    Route::get('/create', [ANIMALINFOsController::class, 'create'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.create');
    Route::get('/show/{aNIMALINFO}',[ANIMALINFOsController::class, 'show'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.show')->where('id', '[0-9]+');
    Route::get('/{aNIMALINFO}/edit',[ANIMALINFOsController::class, 'edit'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.edit')->where('id', '[0-9]+');
    Route::post('/', [ANIMALINFOsController::class, 'store'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.store');
    Route::put('a_n_i_m_a_l__i_n_f_o/{aNIMALINFO}', [ANIMALINFOsController::class, 'update'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.update')->where('id', '[0-9]+');
    Route::delete('/a_n_i_m_a_l__i_n_f_o/{aNIMALINFO}',[ANIMALINFOsController::class, 'destroy'])
         ->name('a_n_i_m_a_l__i_n_f_os.a_n_i_m_a_l__i_n_f_o.destroy')->where('id', '[0-9]+');
});

Route::group([
    'prefix' => 'importations',
], function () {
    Route::get('/', [ImportationsController::class, 'index'])
         ->name('importations.importation.index');

    Route::get('/create', [ImportationsController::class, 'create'])
         ->name('importations.importation.create');
    Route::get('/show/{importation}',[ImportationsController::class, 'show'])
         ->name('importations.importation.show')->where('id', '[0-9]+');



         Route::get('/showdd/{importation}',[ImportationsController::class, 'showdd'])
         ->name('importations.importation.showdd')->where('id', '[0-9]+');




    Route::get('/{importation}/edit',[ImportationsController::class, 'edit'])
         ->name('importations.importation.edit')->where('id', '[0-9]+');
         Route::get('/{importation}/accept',[ImportationsController::class, 'accept'])
         ->name('importation.accept')->where('id', '[0-9]+');

         Route::get('/{importation}/acceptafter',[ImportationsController::class, 'acceptafter'])
         ->name('importation.acceptafter')->where('id', '[0-9]+');


         Route::post('/{importation}/refuse',[ImportationsController::class, 'refuse'])
         ->name('importation.refuse')->where('id', '[0-9]+');






    Route::post('/', [ImportationsController::class, 'store'])
         ->name('importations.importation.store');
    Route::put('importation/{importation}', [ImportationsController::class, 'update'])
         ->name('importations.importation.update')->where('id', '[0-9]+');
    Route::delete('/importation/{importation}',[ImportationsController::class, 'destroy'])
         ->name('importations.importation.destroy')->where('id', '[0-9]+');
});




Route::group([
    'prefix' => 'importationsafter',
], function () {
    Route::get('/', [ImportationsController::class, 'indexafter'])
         ->name('importationsafter.importation.index');


    Route::get('/show/{importation}',[ImportationsController::class, 'showafter'])
         ->name('importationsafter.importation.show')->where('id', '[0-9]+');
         Route::get('/create', [ImportationsController::class, 'createafter'])
         ->name('importations.after.importation.create');
});



Route::group([
    'prefix' => 'exports',
], function () {
    Route::get('/', [ExportsController::class, 'index'])
         ->name('exports.export.index');

         Route::post('/{export}/refuse',[ExportsController::class, 'refuse'])
         ->name('export.refuse')->where('id', '[0-9]+');


         Route::get('/{export}/accept',[ExportsController::class, 'accept'])
         ->name('exports.accept')->where('id', '[0-9]+');

    Route::get('/create', [ExportsController::class, 'create'])
         ->name('exports.export.create');
    Route::get('/show/{export}',[ExportsController::class, 'show'])
         ->name('exports.export.show')->where('id', '[0-9]+');
    Route::get('/{export}/edit',[ExportsController::class, 'edit'])
         ->name('exports.export.edit')->where('id', '[0-9]+');
    Route::post('/', [ExportsController::class, 'store'])
         ->name('exports.export.store');
    Route::put('export/{export}', [ExportsController::class, 'update'])
         ->name('exports.export.update')->where('id', '[0-9]+');
    Route::delete('/export/{export}',[ExportsController::class, 'destroy'])
         ->name('exports.export.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'exportsafter',
], function () {
    Route::get('/', [ExportsController::class, 'indexafter'])
         ->name('exports.after.export.index');

         Route::get('/{export}/accept',[ExportsController::class, 'acceptafter'])
         ->name('exports.after.accept')->where('id', '[0-9]+');


         Route::get('/create', [ExportsController::class, 'createafter'])
         ->name('exports.after.export.create');
    Route::get('/show/{export}',[ExportsController::class, 'showafter'])
         ->name('exports.after.export.show')->where('id', '[0-9]+');

});



























Route::group([
    'prefix' => 'terms',
], function () {
    Route::get('/', [TermsController::class, 'index'])
         ->name('terms.term.index');
    Route::get('/create', [TermsController::class, 'create'])
         ->name('terms.term.create');
    Route::get('/show/{term}',[TermsController::class, 'show'])
         ->name('terms.term.show')->where('id', '[0-9]+');
    Route::get('/{term}/edit',[TermsController::class, 'edit'])
         ->name('terms.term.edit')->where('id', '[0-9]+');
    Route::post('/', [TermsController::class, 'store'])
         ->name('terms.term.store');
    Route::put('term/{term}', [TermsController::class, 'update'])
         ->name('terms.term.update')->where('id', '[0-9]+');
    Route::delete('/term/{term}',[TermsController::class, 'destroy'])
         ->name('terms.term.destroy')->where('id', '[0-9]+');
});




Route::group([
    'prefix' => 'users',
], function () {
    Route::get('/', [UsersController::class, 'index'])
         ->name('users.users.index');
    Route::get('/create', [UsersController::class, 'create'])
         ->name('users.users.create');
    Route::get('/show/{users}',[UsersController::class, 'show'])
         ->name('users.users.show');
    Route::get('/{users}/edit',[UsersController::class, 'edit'])
         ->name('users.users.edit');
    Route::post('/', [UsersController::class, 'store'])
         ->name('users.users.store');
    Route::put('users/{users}', [UsersController::class, 'update'])
         ->name('users.users.update');
    Route::delete('/users/{users}',[UsersController::class, 'destroy'])
         ->name('users.users.destroy');
});

Route::group([
    'prefix' => 'countries',
], function () {
    Route::get('/', [CountriesController::class, 'index'])
         ->name('countries.countries.index');
    Route::get('/create', [CountriesController::class, 'create'])
         ->name('countries.countries.create');
    Route::get('/show/{countries}',[CountriesController::class, 'show'])
         ->name('countries.countries.show')->where('id', '[0-9]+');
    Route::get('/{countries}/edit',[CountriesController::class, 'edit'])
         ->name('countries.countries.edit')->where('id', '[0-9]+');
    Route::post('/', [CountriesController::class, 'store'])
         ->name('countries.countries.store');
    Route::put('countries/{countries}', [CountriesController::class, 'update'])
         ->name('countries.countries.update')->where('id', '[0-9]+');
    Route::delete('/countries/{countries}',[CountriesController::class, 'destroy'])
         ->name('countries.countries.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'clients',
], function () {
    Route::get('/', [ClientsController::class, 'index'])
         ->name('clients.client.index');

         Route::get('/showdd/{client}',[ClientsController::class, 'showdd'])
         ->name('clients.client.showdd')->where('id', '[0-9]+');


    Route::get('/create', [ClientsController::class, 'create'])
         ->name('clients.client.create');
    Route::get('/show/{client}',[ClientsController::class, 'show'])
         ->name('clients.client.show')->where('id', '[0-9]+');
    Route::get('/{client}/edit',[ClientsController::class, 'edit'])
         ->name('clients.client.edit')->where('id', '[0-9]+');
    Route::post('/', [ClientsController::class, 'store'])
         ->name('clients.client.store');
         Route::delete('/client/{client}',[ClientsController::class, 'destroy'])
         ->name('clients.client.destroy')->where('id', '[0-9]+');
});


Route::group([
    'prefix' => 'settings',
], function () {
    Route::get('/', [SettingsController::class, 'index'])
         ->name('settings.setting.index');
    Route::get('/create', [SettingsController::class, 'create'])
         ->name('settings.setting.create');
    Route::get('/show/{setting}',[SettingsController::class, 'show'])
         ->name('settings.setting.show')->where('id', '[0-9]+');
    Route::get('/{setting}/edit',[SettingsController::class, 'edit'])
         ->name('settings.setting.edit')->where('id', '[0-9]+');
    Route::post('/', [SettingsController::class, 'store'])
         ->name('settings.setting.store');
    Route::put('setting/{setting}', [SettingsController::class, 'update'])
         ->name('settings.setting.update')->where('id', '[0-9]+');
    Route::delete('/setting/{setting}',[SettingsController::class, 'destroy'])
         ->name('settings.setting.destroy')->where('id', '[0-9]+');
});



});
















Route::group([
    'prefix' => 'clients',
], function () {






    Route::post('/sungupp', [ClientsController::class, 'sungupp'])
         ->name('clients.client.sungupp');
    Route::put('client/{client}', [ClientsController::class, 'update'])->name('clients.client.update')->where('id', '[0-9]+');
    Route::put('clientm/{client}', [ClientsController::class, 'updatem'])->name('clients.client.updatem')->where('id', '[0-9]+');
    Route::put('refused/{client}', [ClientsController::class, 'refused'])->name('clients.client.refused')->where('id', '[0-9]+');

    Route::get('accept/{client}', [ClientsController::class, 'accept'])->name('clients.client.accept')->where('id', '[0-9]+');


    Route::put('confiramtionc/{client}', [ClientsController::class, 'confiramtion'])
         ->name('clients.client.confiramtion')->where('id', '[0-9]+');

         Route::put('signature/{client}', [ClientsController::class, 'signature'])
         ->name('clients.client.signature')->where('id', '[0-9]+');




    Route::post('/login', [ClientsController::class, 'login'])
         ->name('clients.client.login');
});


