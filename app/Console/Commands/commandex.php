<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Client;
use App\SMS\Sms;
use App\Models\countries as Contry;
use App\Models\export;
use App\Models\importation;
use App\Models\back;
use Carbon\Carbon;
use GuzzleHttp\Client as ClientHTTP;
use App\Models\ApiUser;
use App\Models\acceptation_demande;
use  App\Models\Setting;
use App\Models\export as importations;
use Illuminate\Support\Facades\Log;

class commandex extends Command
{

    protected $signature = 'commandex';


    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $importationsObjects = importations::whereIN('accepted',[1,5])->get();

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

    foreach ($importationsObjects as  $value) {
        # code...

        // ]);
        $data = [
            'CER_SERIAL' => $value->CER_SERIAL,
            'APPLICIANT_ID' => $setting->commercial_register,
            'PAY_MOBILE' => $setting->phone,
            'DEBIT' => 'true',
        ];

    // $data = json_encode($data);
           try{

            $token ='Bearer '.$access_token;
            $headers = [
                'Authorization' => $token,
                'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            ];

            $client2 = new ClientHTTP();
            $res = $client->request('GET', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/GET_PAYMENT_LINK', [
                'headers' => $headers,
                'json' => $data,
            ]);


            $responseBody = $res->getBody()->getContents();
            $resp = json_decode($responseBody);

            if($resp->APPLICATION_STATUS == "APPROVED BUT NOT PAID"){
                $value->accepted = 5;

                $value->linkpayment = $resp->PAYMENT_LINK;
                $value->save();
                $sms = new Sms;
                $client = Client::find($value->client_id);
                $message = "تم قبلو طلبك '.$value->id.' لمشاهدة او دفع الطلب  https://tasareeh.qa/apk";
            $contry = Contry::find($client->contry_id );
            $sms->send($contry->phonecode.$client->phone,$message );
            }


            if($resp->APPLICATION_STATUS == "APPROVED AND PAID"){
                $value->accepted = 3;

               // $value->linkpayment = $resp->PAYMENT_LINK;
                $value->save();
                $sms = new Sms;
                $client = Client::find($value->client_id);
                $message = "تم قبلو طلبك '.$value->id.' لمشاهدة  الطلب  https://tasareeh.qa/apk";
            $contry = Contry::find($client->contry_id );
            $sms->send($contry->phonecode.$client->phone,$message );
            }
            Log::info('Request:', [

                'resp' => $resp,

            ]);
        }catch(\Exception $exception) {

            Log::info('Request:', [

                'exception' => $exception->getMessage(),

            ]);





        }

    }
    }
}
