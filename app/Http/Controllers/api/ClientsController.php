<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\countries;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use App\Models\term;
use Illuminate\Support\Str;
use App\SMS\Sms;
use App\Models\export;
use App\Models\importation;
use App\Models\back;
use Carbon\Carbon;
use GuzzleHttp\Client as ClientHTTP;
use App\Models\ApiUser;
use App\Models\acceptation_demande;
use  App\Models\Setting;
class ClientsController extends Controller
{
    public function create_token(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
            'contry_id' => 'required',
        ]);

        $user = Client::where('phone', $request->input('phone'))->where('contry_id', $request->input('contry_id'))->first();
if($user){
    if($user->accepted != '1'){
        return response()->json([

            'access_token' => '',
        'error' => 'في إنتظار تفعيل حسابك من قبل ادمن.',
        'token_type' => ''
        ]);
    }
}
        if (! $user || ! Hash::check($request->input('password'), $user->password)) {
            return response()->json([

                'access_token' => '',
            'error' =>  'رقم الهاتف أو كلمة المرور غير صحيحة' ,
            'token_type' => ''
            ]);
        }

        $token = $user->createToken('ios')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'error' => '',
            'token_type' => 'Bearer'
        ]);
    }


    public function sungupp(Request $request)
    {


        try {

            $rules = [
                'first_name' => 'string|min:1|required',
            'last_name' => 'string|min:1|required',
            'phone' => 'required|numeric|min:8|unique:clients,phone',
            'ud' => 'required|numeric|min:12|unique:clients,ud',
            'email' => 'required|email|min:10|max:255|unique:clients,email',
            'photo_ud_frent' => 'nullable',
            'photo_ud_back' => 'nullable',
            'password' => 'required',
            'contry_id' => 'required',
            'contry' => 'required',
            'adresse' => 'required',
            'POBOX' => 'required',
            'fax' => 'required',

        ];


          //  $data = $this->getData($request);
          $validator = \Validator::make($request->all(),  $rules);
         if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json([
                'id' => 0,
                'message' => 'الرجاء إدخال بيانات صحيحة',
                'errors' => 'errors'
            ]);
        }else{
            $client =    new Client();
            if ($request->photo_ud_frent) {
                $folderPath = "images/";
                $base64Image = explode(";base64,", $request->photo_ud_frent);
                $explodeImage = explode("image/", $base64Image[0]);
                $imageType = $explodeImage[1];
                $image_base64 = base64_decode($base64Image[1]);
                $file = $folderPath . uniqid() .'.'.$imageType;
                file_put_contents($file, $image_base64);
                $client->photo_ud_frent = $file ;
            }

            if ($request->photo_ud_back) {
                $folderPath = "images/";
                $base64Image2 = explode(";base64,", $request->photo_ud_back);
                $explodeImage2 = explode("image/", $base64Image2[0]);
                $imageType5 = $explodeImage2[1];
                $image_base642 = base64_decode($base64Image2[1]);
                $file5 = $folderPath . uniqid() .'.'.$imageType5;
                file_put_contents($file5, $image_base642);
                $client->photo_ud_back = $file5 ;
            }

         $client->first_name = $request->first_name ;
         $client->last_name = $request->last_name ;
         $client->phone = $request->phone ;
         $client->ud = $request->ud ;
         $client->email = $request->email ;
         $client->adresse = $request->adresse ;
         $client->fax = $request->fax ;
         $client->POBOX = $request->POBOX ;


         $client->password = Hash::make($request->password)  ;
         $client->contry_id = $request->contry_id ;
         $client->contry = $request->contry ;
         $client->save();
         return response()->json([
            'id' =>$client->id,
            'message' => 'success',
            'errors' => ''
        ]);
    }
        } catch (Exception $exception) {
            return response()->json([
                'id' => 0,
                'message' => '',
                'errors' => $exception->getMessage()
            ]);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }





    public function signature($id, Request $request)
    {
        try {
            $rules = [
                'signature' => 'required',
            ];
            $validator = \Validator::make($request->all(),  $rules);
            if ($validator->fails()) {

                //pass validator errors as errors object for ajax response

                return response()->json([
                    'id' => 0,
                    'message' => 'الرجاء إدخال بيانات صحيحة',
                    'errors' => 'errors'
                ]);
            }

            $image = $request->signature;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = Str::random(12) . '.png';

            Storage::disk('local')->put('images/'.$imageName, base64_decode($image));

            $client = Client::findOrFail($id);
            $client->singateur = $imageName;
            $client->save();


    $contry = countries::find($client->contry_id );

    $code = mt_rand(1111,9999);
    $client->code = $code;
    $client->save();
    try {
        $sms = new Sms;
  //  $sms->send($contry->phonecode.$client->phone,"Hello your code :  ".$code);
    } catch (\Throwable $th) {
       dd($th);
    }
            return response()->json([
                'id' => $client->id,
                'message' => 'success',
                'errors' => ''
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'id' => 0,
                'message' => 'الرجاء إدخال بيانات صحيحة',
                'errors' => 'errors'
            ]);

        }
    }



    public function confiramtion($id, Request $request)
    {
        try {
            $rules = [
                'code' => 'required',
            ];
            $validator = \Validator::make($request->all(),  $rules);
            if ($validator->fails()) {

                //pass validator errors as errors object for ajax response

                return response()->json([
                    'id' => 0,
                    'message' => 'الرجاء إدخال بيانات صحيحة',
                    'errors' => 'errors'
                ]);
            }


            $client = Client::findOrFail($id);
            if($client->code == $request->code){
                $client->virification = 1;
                $client->save();


                return response()->json([
                    'id' => $client->id,
                    'message' => 'success',
                    'errors' => ''
                ]);
            }else{
                return response()->json([
                    'id' => 0,
                    'message' => 'errors',
                    'errors' => 'errors'
                ]);
            }


        } catch (Exception $exception) {
           dd( $exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('clients.unexpected_error')]);
        }
    }




        protected function getData(Request $request)
    {
        $rules = [
                'first_name' => 'string|min:1|required',
            'last_name' => 'string|min:1|required',
            'phone' => 'required|numeric|min:8|unique:clients,phone',
            'ud' => 'required|numeric|min:12|unique:clients,ud',
            'email' => 'required|email|min:10|max:255|unique:clients,email',
            'photo_ud_frent' => 'file|nullable',
            'photo_ud_back' => 'file|nullable',
            'password' => 'required',
            'contry_id' => 'required',

        ];




        $data = $request->validate($rules);
        if ($request->hasFile('photo_ud_frent')) {
            $data['photo_ud_frent'] = $this->moveFile($request->file('photo_ud_frent'));
        }
        if ($request->hasFile('photo_ud_back')) {
            $data['photo_ud_back'] = $this->moveFile($request->file('photo_ud_back'));
        }


        $data['password']=  Hash::make($data['password']);

        return $data;
    }
    protected function moveFile($file)
    {
        if (!$file->isValid()) {
            return '';
        }

        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('images',['disk' => 'public_uploads']);

        return  $saved;
    }

    public function term(){
        $term = term::first();
        return response()->json([

            'term_ar' => $term->term_ar,
            'term_en' => $term->term_en,

        ]);
    }


    public function getcount(){
        $exports = export::where('client_id',auth()->user()->id)->with('animal')->count();
        $importations = importation::where('client_id',auth()->user()->id)->where('EXP_CER_SERIAL',null)->count();
        $backs = back::where('client_id',auth()->user()->id)->with('animal')->count();

        return response()->json([

            'exports' => "$exports",
            'importations' => "$importations",
            'backs' => "$backs",


        ]);

    }

public function getcheck(Request $request){

    $setting =  Setting::first();
    $apiUser = ApiUser::first();
  $client = new ClientHTTP();
         $res = $client->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/token', [
             'form_params' => [
                 'Username' => $apiUser->Username,
                 'Password' => $apiUser->Password,
                 'grant_type' => 'password',
             ]
         ]);
         $response = (string) $res->getBody();
         $response =json_decode($response); // Using this you can access any key like below
         $access_token = $response->access_token;
       // dd($access_token);

    //    return response()->json([

    //     'CER_SERIAL' => $request->CER_SERIAL,
    //     'APPLICIANT_ID' => $setting->commercial_register,
    //     'token' =>'Bearer '.$access_token


    // ]);
    $data = [
        'CER_SERIAL' => $request->CER_SERIAL,
        'APPLICIANT_ID' => $setting->commercial_register,
    ];
$data = json_encode($data);
       try{

        $token ='Bearer '.$access_token;
        $headers = [
            'Authorization' => $token,
            'Accept' => 'application/json',
        'Content-Type' => 'application/json',
        ];

        $client2 = new ClientHTTP();
        $res = $client->request('GET', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/GET_CER_STATUS', [
            'headers' => $headers,
            'body' => json_encode($data),
        ]);
        return response()->json([

            $res


        ]);
        $responseBody = $res->getBody()->getContents();
        $resp = json_decode($responseBody);
        return response()->json([

            $res


        ]);

    }catch(Exception $exception) {
       return back()->withInput()
       ->withErrors(['unexpected_error' => $exception->getMessage()]);

    }

}











public function getnotife(){

    $exports = export::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
    $importations = importation::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
    $backs = back::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
    $c = collect();


foreach ($exports as $key => $value) {
    $dd = acceptation_demande::where('demande_id', $value->id)->orderBy('created_at','desc')->get();
    foreach($dd as $d){
        $d->name=$value->CER_TYPE.'/'.$value->COMP_ID;
    $d->type=" طلب خروج";
    $d->message="تم قبول طلبك من قبل المشرف في إنتظار قرار الهيئة ";
    $d->date = Carbon::parse($d->created_at)->format('d-m-Y');
    $c->add( $d);
    }

}
foreach ($importations as $key => $value) {
    $dd = acceptation_demande::where('demande_id', $value->id)->orderBy('created_at','desc')->get();
foreach($dd as $d){
    $d->name=$value->CER_TYPE.'/'.$value->COMP_ID;
    $d->type=" طلب دخول";
$d->message="تم قبول طلبك من قبل المشرف في إنتظار قرار الهيئة ";
$d->date = Carbon::parse($d->created_at)->format('d-m-Y');
$c->add( $d);
}
}
foreach ($backs as $key => $value) {
    $dd = acceptation_demande::where('demande_id', $value->id)->orderBy('created_at','desc')->get();
foreach($dd as $d){
    $d->name=$value->CER_TYPE.'/'.$value->COMP_ID;
    $d->type=" طلب عودة";
$d->message="تم قبول طلبك من قبل المشرف في إنتظار قرار الهيئة ";
$d->date = Carbon::parse($d->created_at)->format('d-m-Y');
$c->add( $d);
}
}

$repence = collect();
foreach($c->sortByDesc('created_at') as $it){

    $repence->add( $it);
}
return response()->json(


    $repence

);






}











    public function getlist(){
        $exports = export::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        $importations = importation::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        $backs = back::where('client_id',auth()->user()->id)->orderBy('created_at','desc')->get();
        $c = collect();


foreach ($exports as $key => $value) {
    $value->type=" طلب خروج";
    $value->COMP_ID="$value->COMP_ID";
    $c->add( $value);
}
foreach ($importations as $key => $value) {
    $value->type=" طلب دخول";
    $value->COMP_ID="$value->COMP_ID";
    $c->add( $value);
}

$repence = collect();
foreach($c->sortByDesc('created_at') as $it){
    if ($it->accepted == null) {
        $it->accepted = "null";
    }
    $repence->add( $it);
}
        return response()->json(

            $repence


        );

    }

}
