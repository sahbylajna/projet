<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use App\Models\Client;
use App\SMS\Sms;
use App\Models\countries as Contry;
use App\Models\importation;
use App\Models\ANIMAL_INFO;
use App\Models\acceptation_demande;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as ClientHTTP;
use GuzzleHttp\Exception\RequestException;


use App\Models\ApiUser;

class ImportationsController extends Controller
{

    /**
     * Display a listing of the importations.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('delegate')){
            $importations = importation::where('delegate',Auth::user()->id)->where('EXP_CER_SERIAL',null)->with('client')->orderBy('id','desc')->get();
        }else{
        $importations = importation::where('EXP_CER_SERIAL',null)->with('client')->orderBy('id','desc')->get();
        }
        return view('importations.index', compact('importations', 'request'));
    }


    public function indexafter(Request $request)
    {
        if(Auth::user()->hasRole('delegate')){
        $importations = importation::where('delegate',Auth::user()->id)->where('EXP_CER_SERIAL','!=',null)->with('client')->orderBy('id','desc')->get();
    }else{

        $importations = importation::where('EXP_CER_SERIAL','!=',null)->with('client')->orderBy('id','desc')->get();
    }
        return view('importations.after.index', compact('importations', 'request'));
    }


    /**
     * Show the form for creating a new importation.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('importations.create', compact('clients'));
    }
    public function createafter()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('importations.after.create', compact('clients'));
    }

    public function store(Request $request)
    {
     //   dd($request);

     try {

            $data = $this->getData($request);

            $importations =     importation::create($data);


            $animal = new ANIMAL_INFO();
            $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRYa;
            $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRY;
            $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRY;
            $animal->ANML_SPECIES = $request->ANML_SPECIES;
            $animal->ANML_SEX = $request->ANML_SEX;
            $animal->ANML_NUMBER = $request->ANML_NUMBER;
            $animal->ANML_USE = $request->ANML_USE;
            $animal->ANIMAL_BREED = $request->ANIMAL_BREED;

                $animal->client_id =  auth()->user()->id ;
                $animal->save();
                $importations->animal()->attach( $animal->id);
if($importations->EXP_CER_SERIAL != null){
    return redirect()->route('importationsafter.importation.index')
    ->with('success_message', trans('importations.model_was_added'));
}else{
    return redirect()->route('importations.importation.index')
    ->with('success_message', trans('importations.model_was_added'));
}

        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }


    public function show($id)
    {
        $importation = importation::with('client')->with('animal')->findOrFail($id);
        return view('importations.show', compact('importation'));
    }
    public function showdd($id)
    {
        $importation = importation::with('client')->with('animal')->findOrFail($id);
       dd( $importation);
    }

    public function showafter($id)
    {
        $importation = importation::with('client')->with('animal')->findOrFail($id);
        return view('importations.after.show', compact('importation'));
    }

    public function edit($id)
    {
        $importation = importation::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();


        return view('importations.edit', compact('importation','clients'));
    }


    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $importation = importation::findOrFail($id);
            $importation->update($data);

            return redirect()->route('importations.importation.index')
                ->with('success_message', trans('importations.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }


    public function destroy($id)
    {
        try {
            $importation = importation::findOrFail($id);
            $after = true;
            if($importation->EXP_CER_SERIAL != null){
                $after = false;
            }

            $importation->delete();


            if($after){
                return redirect()->route('importationsafter.importation.index')
                ->with('success_message', trans('importations.model_was_deleted'));
            }else{
                 return redirect()->route('importations.importation.index')
                ->with('success_message', trans('importations.model_was_deleted'));
            }



        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }





    public function indexclient()
    {

        $importations = importation::where('client_id',auth()->guard('clientt')->user()->id)->where('EXP_CER_SERIAL',null)->get();

        return view('importationsclient.index', compact('importations'));
    }

    public function indexclientafter()
    {

        $importations = importation::where('client_id',auth()->guard('clientt')->user()->id)->where('EXP_CER_SERIAL','!=',null)->get();

        return view('importationsclient.after.index', compact('importations'));
    }


    public function createclient()
    {



        return view('importationsclient.create');
    }

    public function createclientafter()
    {



        return view('importationsclient.after.create');
    }


    public function storeclient(Request $request)
    {


        try {

            $data = $this->getData($request);



          $importation =  importation::create($data);



          $animal = new ANIMAL_INFO();
          $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRY;
          $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRY;
          $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRY;
          $animal->ANML_SPECIES = $request->ANML_SPECIES;
          $animal->ANML_SEX = $request->ANML_SEX;
          $animal->ANML_NUMBER = $request->ANML_NUMBER;
          $animal->ANML_USE = $request->ANML_USE;
          $animal->ANIMAL_BREED = $request->ANIMAL_BREED;
          $animal->client_id = auth()->guard('clientt')->user()->id ;
          $animal->save();
          $importation->animal()->attach( $animal->id);
if($importation->EXP_CER_SERIAL == null){
    return redirect()->route('importations.client.index')
    ->with('success_message', trans('importations.model_was_added'));
}else{
    return redirect()->route('importations.after.client.index')
    ->with('success_message', trans('importations.model_was_added'));
}


        } catch (Exception $exception) {
//dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => $exception->getMessage()]);
        }
    }

    /**
     * Display the specified importation.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function showclient($id)
    {
        $importation = importation::with('client','comp')->findOrFail($id);

        return view('importationsclient.show', compact('importation'));
    }

    public function editclient($id)
    {
        $importation = importation::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();


        return view('importationsclient.edit', compact('importation','clients'));
    }


    public function updateclient($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $importation = importation::findOrFail($id);
            $importation->update($data);

            return redirect()->route('importations.client.index')
                ->with('success_message', trans('importations.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }


    public function destroyclient($id)
    {
        try {
            $importation = importation::findOrFail($id);
            $importation->delete();

            return redirect()->route('importations.client.index')
                ->with('success_message', trans('importations.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('importations.unexpected_error')]);
        }
    }

    protected function getData(Request $request)
    {
        $rules = [
                'client_id' => 'nullable',
            'CER_TYPE' => 'nullable',
            'CER_LANG' => 'nullable',
            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'nullable',
            'EXP_NAME' => 'nullable',
            'EXP_TEL' => 'nullable',
            'EXP_QID' => 'nullable',
            'EXP_FAX' => 'nullable',
            'EXP_COUNTRY' => 'nullable',
            'IMP_NAME' => 'nullable',
            'IMP_ADDRESS' => 'nullable',
            'IMP_FAX' => 'nullable',
            'IMP_TEL' => 'nullable',
            'IMP_POBOX' => 'nullable',
            'IMP_COUNTRY' => 'nullable',
            'ORIGIN_COUNTRY' => 'nullable',
            'SHIPPING_PLACE' => 'nullable',
            'ENTERY_PORT' => 'nullable',
            'EXPECTED_ARRIVAL_DATE' => 'nullable',
            'TRANSPORT' => 'nullable',
            'SHIPPING_DATE' => 'nullable',
            'APPLICANT_NAME' => 'nullable',
            'APPLICANT_TEL' => 'nullable',
            'EXP_NATIONALITY' => 'nullable',
            'EXP_PASSPORT_NUM' => 'nullable',
            'files' => 'required',
            'Pledge' => 'required',
            'EXP_CER_SERIAL' => 'nullable',

        ];


        $data = $request->validate($rules);
        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }

        if ($request->hasFile('Pledge')) {
            $data['Pledge'] = $this->moveFile($request->file('Pledge'));
        }
       // dd( $data);
       if(Auth::user()->hasRole('delegate')){
        $data['delegate'] = Auth::user()->id;
    }


        return $data;
    }
    protected function moveFile($file)
    {


        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('pdf',['disk' => 'public_uploads']);

        return  $saved;
    }
    public function accept($id)
    {
        $importation = importation::findOrFail($id);
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
      $data = [];
$data['CER_TYPE'] = $importation->CER_TYPE;
$data['CER_LANG'] = $importation->CER_LANG;
$data['COMP_ID'] = $importation->COMP_ID;
$data['EUSER_QID'] = $importation->EUSER_QID;
$data['EXP_NAME'] = $importation->EXP_NAME;
$data['EXP_TEL'] = $importation->EXP_TEL;
$data['EXP_QID'] = $importation->EXP_QID;
$data['EXP_FAX'] = $importation->EXP_FAX;
$data['EXP_COUNTRY'] = $importation->EXP_COUNTRY;
$data['IMP_NAME'] = $importation->IMP_NAME;
$data['IMP_ADDRESS'] = "IMP_ADDRESS";
$data['IMP_FAX'] = "554433";
$data['IMP_TEL'] = $importation->IMP_TEL;
$data['IMP_POBOX'] = "554433";
$data['IMP_COUNTRY'] = $importation->IMP_COUNTRY;
$data['ORIGIN_COUNTRY'] = $importation->ORIGIN_COUNTRY;
$data['SHIPPING_PLACE'] = $importation->SHIPPING_PLACE;
$data['ENTERY_PORT'] = $importation->ENTERY_PORT;
$data['EXPECTED_ARRIVAL_DATE'] = $importation->EXPECTED_ARRIVAL_DATE;
$data['TRANSPORT'] = $importation->TRANSPORT;
$data['SHIPPING_DATE'] = $importation->SHIPPING_DATE;
$data['APPLICANT_NAME'] = $importation->APPLICANT_NAME;
$data['APPLICANT_TEL'] = $importation->APPLICANT_TEL;
$data['EXP_NATIONALITY'] = $importation->EXP_NATIONALITY;
$data['EXP_PASSPORT_NUM'] = $importation->EXP_PASSPORT_NUM;
$data = json_encode($data, JSON_UNESCAPED_UNICODE);
$ANIMALINFO = [];


foreach ($importation->animal as $key => $value) {

    $data1['EXPORT_COUNTRY'] = $value->EXPORT_COUNTRY;
    $data1['ORIGIN_COUNTRY'] = $value->ORIGIN_COUNTRY;
    $data1['TRANSIET_COUNTRY'] = $value->TRANSIET_COUNTRY;
    $data1['ANML_SPECIES'] = $value->ANML_SPECIES;
    $data1['ANML_SEX'] = $value->ANML_SEX;
    $data1['ANML_NUMBER'] = $value->ANML_NUMBER;
    $data1['ANML_USE'] = $value->ANML_USE;
    $data1['ANML_MICROCHIP'] = $value->ANIMAL_BREED;
    $ANIMALINFO[$key] = $data1;


}

$ANIMALINFOj = json_encode($ANIMALINFO, JSON_UNESCAPED_UNICODE);


$token ='Bearer '.$access_token;

$headers = [
    'Authorization' => $token,
    'Accept'        => 'application/json',
];





$pdfContents = file_get_contents(asset($importation->files));

if($importation->delegate ==null){
    $client5 = \App\Models\Client::findOrFail( $importation->client_id);

    $term = \App\Models\term::first();
    $client5->term_ar = $term->Conditionar;
    $data12 =        $client5->toArray();
    //dd($data);
    view()->share('data', $data12);
    $reportHtml = view('test',['data' => $data12] )->render();

            $arabic = new \ArPHP\I18N\Arabic();
            $p = $arabic->arIdentify($reportHtml);

            for ($i = count($p)-1; $i >= 0; $i-=2) {
                $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
                $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);

            }

            $pdf = PDF::loadHTML($reportHtml);

    $fileName = $client5->ud . '.pdf';
    $pdf->save(public_path('pdf/' . $fileName));
    $pdfContents2 = file_get_contents(asset('pdf/' . $fileName));
    $pdfContents3 = file_get_contents(asset( $client5->photo_ud_frent));
    $pdfContents4 = file_get_contents(asset( $client5->photo_ud_back));

    }else{
        $pdfContents2 = file_get_contents(asset($importation->Pledge));
    $pdfContents3 = '';
    $pdfContents4 ='';

    }




//dd($headers, $data,$ANIMALINFOj,asset('pdf/' . $fileName),asset( $client5->photo_ud_frent),asset( $client5->photo_ud_back),asset($importation->files),$pdfContents,$pdfContents2,$pdfContents3,$pdfContents4);





try{

    $ClientHTTP = new ClientHTTP();

$IMPRC_SUBMIT = $ClientHTTP->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/IMPRC_SUBMIT', [
    'headers' => $headers, // Add your headers
    'multipart' => [
        [
            'name' => 'DATA',
            'contents' => $data,
        ],
        [
            'name' => 'ANIMAL_INFO',
            'contents' => $ANIMALINFOj,
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents, // PDF file contents
            'filename' => 'test.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents3, // PDF file contents
            'filename' => 'photo_ud_frent.pdf', // Adjust the filename
        ],
        // [
        //     'name' => 'files[]',
        //     'contents' => $pdfContents4, // PDF file contents
        //     'filename' => 'photo_ud_back.pdf', // Adjust the filename
        // ],
        // [
        //     'name' => 'files[]',
        //     'contents' => $pdfContents2, // PDF file contents
        //     'filename' => 'Pledge.pdf', // Adjust the filename
        // ],
    ],
]);

$responseBodyIMPRC_SUBMIT = $IMPRC_SUBMIT->getBody()->getContents();
$resppost = json_decode($responseBodyIMPRC_SUBMIT);


$importation->CER_SERIAL = $resppost->CER_SERIAL;
$importation->accepted = 1;
$importation->save();
    $acceptation = new acceptation_demande();
    $acceptation->User_id = Auth()->user()->id;
    $acceptation->demande_id = $importation->id;
    $acceptation->type = 'importation';
    $acceptation->commenter = "تم قبول طلبك من قبل المشرف في إنتظار قرار الثروة الحيوانية ";
    $acceptation->save();

    if($importation->delegate ==null){
        $sms = new Sms;
        $clientsms = Client::find($importation->client_id);

    $contry = Contry::find($clientsms->contry_id );
    $sms->send($contry->phonecode.$clientsms->phone,$acceptation->commenter );

        }



}catch(RequestException $exception) {


    $responsecatch = $exception->getResponse();

    if ($responsecatch !== null) {
        $statusCode = $responsecatch->getStatusCode();
        $body = $responsecatch->getBody()->getContents();
        $resp = json_decode($body);
       // dd($resp);
       if($statusCode == 400){
            return back()->withInput()
            ->withErrors(['unexpected_error' => $resp->CER_ERROR]);
        }else{
            return back()->withInput()
            ->withErrors(['unexpected_error' => $resp->Message]);
        }
        // Handle the response for non-2xx status codes

    } else {
        // Handle the exception (e.g., network error)
        return back()->withInput()
        ->withErrors(['unexpected_error' =>' here'. $exception->getMessage()]);
    }
}

     //







       return back();



        return view('importations.edit', compact('importation','clients'));
    }





    public function acceptafter($id)
    {
        $importation = importation::findOrFail($id);
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
      $data = [];
$data['CER_TYPE'] = $importation->CER_TYPE;
$data['CER_LANG'] = $importation->CER_LANG;
$data['COMP_ID'] = $importation->COMP_ID;
$data['EUSER_QID'] = $importation->EUSER_QID;
$data['EXP_NAME'] = $importation->EXP_NAME;
$data['EXP_TEL'] = $importation->EXP_TEL;
$data['EXP_QID'] = $importation->EXP_QID;
$data['EXP_FAX'] = $importation->EXP_FAX;
$data['EXP_COUNTRY'] = $importation->EXP_COUNTRY;
$data['IMP_NAME'] = $importation->IMP_NAME;
$data['IMP_ADDRESS'] = $importation->IMP_ADDRESS;
$data['IMP_FAX'] = $importation->IMP_FAX;
$data['IMP_TEL'] = $importation->IMP_TEL;
$data['IMP_POBOX'] = $importation->IMP_POBOX;
$data['IMP_COUNTRY'] = $importation->IMP_COUNTRY;
$data['ORIGIN_COUNTRY'] = $importation->ORIGIN_COUNTRY;
$data['SHIPPING_PLACE'] = $importation->SHIPPING_PLACE;
$data['ENTERY_PORT'] = $importation->ENTERY_PORT;
$data['EXPECTED_ARRIVAL_DATE'] = $importation->EXPECTED_ARRIVAL_DATE;
$data['TRANSPORT'] = $importation->TRANSPORT;
$data['SHIPPING_DATE'] = $importation->SHIPPING_DATE;
$data['APPLICANT_NAME'] = $importation->APPLICANT_NAME;
$data['APPLICANT_TEL'] = $importation->APPLICANT_TEL;
$data['EXP_NATIONALITY'] = $importation->EXP_NATIONALITY;
$data['EXP_PASSPORT_NUM'] = $importation->EXP_PASSPORT_NUM;
$data['EXP_CER_SERIAL'] = $importation->EXP_CER_SERIAL;
$data = json_encode($data, JSON_UNESCAPED_UNICODE);
$ANIMALINFO = [];


foreach ($importation->animal as $key => $value) {

    $data1['EXPORT_COUNTRY'] = $value->EXPORT_COUNTRY;
    $data1['ORIGIN_COUNTRY'] = $value->ORIGIN_COUNTRY;
    $data1['TRANSIET_COUNTRY'] = $value->TRANSIET_COUNTRY;
    $data1['ANML_SPECIES'] = $value->ANML_SPECIES;
    $data1['ANML_SEX'] = $value->ANML_SEX;
    $data1['ANML_NUMBER'] = $value->ANML_NUMBER;
    $data1['ANML_USE'] = $value->ANML_USE;
    $data1['ANML_MICROCHIP'] = $value->ANIMAL_BREED;
    $ANIMALINFO[$key] = $data1;


}

$ANIMALINFOj = json_encode($ANIMALINFO, JSON_UNESCAPED_UNICODE);


$token ='Bearer '.$access_token;

$headers = [
    'Authorization' => $token,
    'Accept'        => 'application/json',
];






$pdfContents = file_get_contents(asset($importation->files));

if($importation->delegate ==null){
    $client5 = Client::findOrFail( $importation->client_id);

    $term = \App\Models\term::first();
    $client5->term_ar = $term->Conditionar;
    $data12 =        $client5->toArray();
    //dd($data);
    view()->share('data', $data12);
    $reportHtml = view('test',['data' => $data12] )->render();

            $arabic = new \ArPHP\I18N\Arabic();
            $p = $arabic->arIdentify($reportHtml);

            for ($i = count($p)-1; $i >= 0; $i-=2) {
                $utf8ar = $arabic->utf8Glyphs(substr($reportHtml, $p[$i-1], $p[$i] - $p[$i-1]));
                $reportHtml = substr_replace($reportHtml, $utf8ar, $p[$i-1], $p[$i] - $p[$i-1]);

            }

            $pdf = PDF::loadHTML($reportHtml);

    $fileName = $client5->ud . '.pdf';
    $pdf->save(public_path('pdf/' . $fileName));
    $pdfContents2 = file_get_contents(asset('pdf/' . $fileName));
    $pdfContents3 = file_get_contents(asset( $client5->photo_ud_frent));
    $pdfContents4 = file_get_contents(asset( $client5->photo_ud_back));

    }else{
        $pdfContents2 = file_get_contents(asset($importation->Pledge));
    $pdfContents3 = '';
    $pdfContents4 ='';

    }

try{

    $client2 = new ClientHTTP();

$re = $client2->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/IMPRC_SUBMIT_AFTER_RACING', [
    'headers' => $headers, // Add your headers
    'multipart' => [
        [
            'name' => 'DATA',
            'contents' => $data,
        ],
        [
            'name' => 'ANIMAL_INFO',
            'contents' => $ANIMALINFOj,
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents, // PDF file contents
            'filename' => 'files.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents3, // PDF file contents
            'filename' => 'photo_ud_frent.pdf', // Adjust the filename
        ],
        // [
        //     'name' => 'files[]',
        //     'contents' => $pdfContents4, // PDF file contents
        //     'filename' => 'photo_ud_back.pdf', // Adjust the filename
        // ],
        // [
        //     'name' => 'files[]',
        //     'contents' => $pdfContents2, // PDF file contents
        //     'filename' => $fileName, // Adjust the filename
        // ],
    ],
]);

$responseBody = $re->getBody()->getContents();
$resp = json_decode($responseBody);


$importation->CER_SERIAL = $resp->CER_SERIAL;
$importation->accepted = 1;
$importation->save();
    $acceptation = new acceptation_demande();
    $acceptation->User_id = Auth()->user()->id;
    $acceptation->demande_id = $importation->id;
    $acceptation->type = 'importation';
    $acceptation->commenter = "تم قبول طلبك من قبل المشرف في إنتظار قرار الثروة الحيوانية ";
    $acceptation->save();
    if($importation->delegate ==null){
        $sms = new Sms;
        $clientsms = Client::find($importation->client_id);

    $contry = Contry::find($clientsms->contry_id );
    $sms->send($contry->phonecode.$clientsms->phone,$acceptation->commenter );

        }


}catch(RequestException $exception) {

    $response = $exception->getResponse();

    if ($response !== null) {
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $resp = json_decode($body);

      if($statusCode == 400){
            return back()->withInput()
            ->withErrors(['unexpected_error' => $resp->CER_ERROR]);
        }else{
            return back()->withInput()
            ->withErrors(['unexpected_error' => $resp->Message]);
        }
    } else {
        // Handle the exception (e.g., network error)
        return back()->withInput()
        ->withErrors(['unexpected_error' => $exception->getMessage()]);
    }
}

     //







       return back();



        return view('importations.edit', compact('importation','clients'));
    }
















    public function refuse($id,Request $request){

        $message = "تم رفض طلبك من اللجنة المنضمة لسباق الهجن و ذلك لسبب : ".$request->commenter;


        $importation = importation::findOrFail($id);
        $importation->accepted = 0;
        $importation->reson = $request->commenter;
$importation->save();
    $acceptation = new acceptation_demande();
    $acceptation->User_id = Auth()->user()->id;
    $acceptation->demande_id = $importation->id;
    $acceptation->type = 'importation';
    $acceptation->commenter = $request->commenter;
    $acceptation->save();
    if($importation->delegate ==null){
        $sms = new Sms;
        $client = Client::find($importation->client_id);

    $contry = Contry::find($client->contry_id );
    $sms->send($contry->phonecode.$client->phone,$message );

        }




        return back();
    }




}
