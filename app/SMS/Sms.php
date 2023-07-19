<?php

namespace App\SMS;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client as ClientHTTP;
class Sms {

    public function send($receiverNumber,$messaged) {


        try{
            $client2 = new ClientHTTP();
            $res = $client2->request('GET', 'https://api.smsala.com/api/SendSMS', [
                'query' => [
                    'api_id'=>'API1369934368026',
                    'api_password'=>'POGGgMthKO',
                    'sms_type'=>'P',
                    'encoding'=>'T',
                    'sender_id'=>'CRC',
                    'phonenumber'=>$receiverNumber,
                    'textmessage'=>$messaged,
                ],

            ]);
           // dd($response);
        }catch(Exception $exception) {
        dd($exception);
        }

    //    try {
    //     $sid    = "ACf169e8f69b9fe6f3fd803569612a0692";
    //     $token  = "858882cbb8a43eaf88c38152d952593c";
    //     $twilio = new Client($sid, $token);

    //     $message = $twilio->messages
    //       ->create("+21656818880", // to
    //         array(
    //             "from" => "+19852484364",
    //                                    "body" => $messaged
    //                                )
    //                       );

    //                       return true;
    //    } catch (\Throwable $th) {

    //     Log::error($th);
    //     return true;
    //    }



    }
}
