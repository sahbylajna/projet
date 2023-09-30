<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

use App\Models\ANIMAL_INFO;
use App\Models\Client;
use App\Models\export;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as ClientHTTP;
use App\SMS\Sms;
use App\Models\ApiUser;
use App\Models\countries as Contry;
use App\Models\acceptation_demande;

class ExportsController extends Controller
{


    /**
     * Display a listing of the exports.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $exports = export::where('IMP_CER_SERIAL',null)->with('client')->paginate(25);

        return view('exports.index', compact('exports'));
    }
    public function indexafter()
    {
        $exports = export::where('IMP_CER_SERIAL','!=',null)->with('client')->paginate(25);

        return view('exports.after.index', compact('exports'));
    }
    /**
     * Show the form for creating a new export.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {


        return view('exports.create');
    }
    public function createafter()
    {


        return view('exports.after.create');
    }


    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            $export =   export::create($data);

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
                $export->animal()->attach( $animal->id);
            if($export->IMP_CER_SERIAL != null){

                return redirect()->route('exportsafter.export.index')
                ->with('success_message', trans('exports.model_was_added'));
            }else{
                return redirect()->route('exports.export.index')
                ->with('success_message', trans('exports.model_was_added'));
            }

            return redirect()->route('exports.export.index')
                ->with('success_message', trans('exports.model_was_added'));
        } catch (Exception $exception) {
            dd( $exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
        }
    }

    /**
     * Display the specified export.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $export = export::with('client')->findOrFail($id);

        return view('exports.show', compact('export'));
    }

    public function showafter($id)
    {
        $export = export::with('client')->findOrFail($id);

        return view('exports.after.show', compact('export'));
    }

    /**
     * Show the form for editing the specified export.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $export = export::findOrFail($id);
        $clients = Client::pluck('created_at','id')->all();


        return view('exports.edit', compact('export','clients'));
    }


    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $export = export::findOrFail($id);
            $export->update($data);

            return redirect()->route('exports.export.index')
                ->with('success_message', trans('exports.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
        }
    }

    /**
     * Remove the specified export from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $export = export::findOrFail($id);
            $export->delete();

            return redirect()->route('exports.export.index')
                ->with('success_message', trans('exports.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
                'client_id' => 'nullable|string',
            'CER_TYPE' => 'nullable|string|min:1',
            'CER_LANG' => 'nullable|string|min:1',
            'COMP_ID' => 'nullable|string',
            'EUSER_QID' => 'nullable|string|min:1',
            'EXP_NAME' => 'nullable|string|min:1',
            'EXP_TEL' => 'nullable|string|min:1',
            'EXP_FAX' => 'nullable|string|min:1',
            'EXP_COUNTRY' => 'nullable|string',
            'IMP_NAME' => 'nullable|string|min:1',
            'IMP_QID' => 'string|min:1',
            'IMP_FAX' => 'nullable|string|min:1',
            'IMP_TEL' => 'nullable|string|min:1',
            'IMP_COUNTRY' => 'nullable|string',
            'ORIGIN_COUNTRY' => 'nullable|string',
            'SHIPPING_PLACE' => 'nullable|string|min:1',
            'TRANSPORT' => 'nullable|string|min:1',
            'SHIPPING_DATE' => 'nullable|string',
            'APPLICANT_NAME' => 'nullable|string|min:1',
            'APPLICANT_TEL' => 'nullable|string|min:1',
            'EXP_NATIONALITY' => 'nullable|string|min:1',
            'EXP_PASSPORT_NUM' => 'nullable|string|min:1',
            'files' => 'required',
            'Pledge' => 'required',
            'IMP_CER_SERIAL' => 'nullable',


        ];

        $data = $request->validate($rules);
        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }

        if ($request->hasFile('Pledge')) {
            $data['Pledge'] = $this->moveFile($request->file('Pledge'));
        }




        return $data;
    }
    protected function moveFile($file)
    {


        $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('pdf',['disk' => 'public_uploads']);

        return  $saved;
    }


     public function indexclient()
     {

         $exports = export::where('client_id',auth()->guard('clientt')->user()->id)->where('IMP_CER_SERIAL',null)->get();

         return view('exportsclient.index', compact('exports'));
     }

     public function createclient()
     {
         $clients = Client::pluck('ud','id')->all();


         return view('exportsclient.create', compact('clients'));
     }



     public function indexclientafter()
     {

         $exports = export::where('client_id',auth()->guard('clientt')->user()->id)->where('IMP_CER_SERIAL','!=',null)->get();

         return view('exportsclient.after.index', compact('exports'));
     }

     public function createclientafter()
     {


         return view('exportsclient.after.create');
     }

     /**
      * Store a new export in the storage.
      *
      * @param Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
      */
     public function storeclient(Request $request)
     {
         try {

             $data = $this->getData($request);



           $export =  export::create($data);

           foreach ($request->ANML_SPECIES as $key => $animale) {
             $animal = new ANIMAL_INFO();

             $animal->ANML_SPECIES = $request->ANML_SPECIES[$key];
             $animal->ANML_SEX = $request->ANML_SEX[$key];
             $animal->ANML_NUMBER = $request->ANML_NUMBER[$key];
             $animal->ANML_USE = $request->ANML_USE[$key];
             $animal->ANIMAL_BREED = $request->ANML_MICROCHIP[$key];
             $animal->client_id =  auth()->guard('clientt')->user()->id ;
             $animal->save();
             $export->animal()->attach( $animal->id);

           }

if($export->IMP_CER_SERIAL == null){
    return redirect()->route('exports.client.index')
    ->with('success_message', trans('exports.model_was_added'));
}else{
    return redirect()->route('exports.after.client.index')
    ->with('success_message', trans('exports.model_was_added'));
}



         } catch (Exception $exception) {
 dd($exception);
             return back()->withInput()
                 ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
         }
     }

     /**
      * Display the specified export.
      *
      * @param int $id
      *
      * @return \Illuminate\View\View
      */
     public function showclient($id)
     {
         $export = export::with('client','comp')->findOrFail($id);

         return view('exportsclient.show', compact('export'));
     }

     /**
      * Show the form for editing the specified export.
      *
      * @param int $id
      *
      * @return \Illuminate\View\View
      */
     public function editclient($id)
     {
         $export = export::findOrFail($id);
         $clients = Client::pluck('ud','id')->all();


         return view('exportsclient.edit', compact('export','clients'));
     }

     /**
      * Update the specified export in the storage.
      *
      * @param int $id
      * @param Illuminate\Http\Request $request
      *
      * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
      */
     public function updateclient($id, Request $request)
     {
         try {

             $data = $this->getData($request);

             $export = export::findOrFail($id);
             $export->update($data);

             return redirect()->route('exports.client.index')
                 ->with('success_message', trans('exports.model_was_updated'));
         } catch (Exception $exception) {

             return back()->withInput()
                 ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
         }
     }

     /**
      * Remove the specified export from the storage.
      *
      * @param int $id
      *
      * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
      */
     public function destroyclient($id)
     {
         try {
             $export = export::findOrFail($id);
             $export->delete();

             return redirect()->route('exports.client.index')
                 ->with('success_message', trans('exports.model_was_deleted'));
         } catch (Exception $exception) {

             return back()->withInput()
                 ->withErrors(['unexpected_error' => trans('exports.unexpected_error')]);
         }
     }


     public function accept($id)
     {
         $export = export::findOrFail($id);
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

 $data['CER_TYPE'] = $export->CER_TYPE;
 $data['CER_LANG'] = $export->CER_LANG;
 $data['COMP_ID'] = $export->COMP_ID;
 $data['EUSER_QID'] = $export->EUSER_QID;
 $data['EXP_NAME'] = $export->EXP_NAME;
 $data['EXP_TEL'] = $export->EXP_TEL;
 $data['EXP_FAX'] = $export->EXP_FAX;
 $data['EXP_COUNTRY'] = $export->EXP_COUNTRY;
 $data['IMP_NAME'] = $export->IMP_NAME;
 $data['IMP_QID'] = $export->IMP_QID;
 $data['IMP_FAX'] = $export->IMP_FAX;
 $data['IMP_TEL'] = $export->IMP_TEL;
 $data['IMP_COUNTRY'] = $export->IMP_COUNTRY;
 $data['ORIGIN_COUNTRY'] = $export->ORIGIN_COUNTRY;
 $data['SHIPPING_PLACE'] = $export->SHIPPING_PLACE;
 $data['TRANSPORT'] = $export->TRANSPORT;


 $data['SHIPPING_DATE'] = $export->SHIPPING_DATE;
 $data['APPLICANT_NAME'] = $export->APPLICANT_NAME;
 $data['APPLICANT_TEL'] = $export->APPLICANT_TEL;
 $data['EXP_NATIONALITY'] = $export->EXP_NATIONALITY;
 $data['EXP_PASSPORT_NUM'] = $export->EXP_PASSPORT_NUM;
 $data = json_encode($data);

 $ANIMALINFO = [];

 foreach ($export->animal as $key => $value) {


    $data1['ANML_SPECIES'] = $value->ANML_SPECIES;
    $data1['ANML_SEX'] = $value->ANML_SEX;
    $data1['ANML_NUMBER'] = $value->ANML_NUMBER;
    $data1['ANML_USE'] = $value->ANML_USE;
    $data1['ANML_MICROCHIP'] = $value->ANIMAL_BREED;

     $ANIMALINFO[$key] = $data1;


 }

 $ANIMALINFOj = json_encode($ANIMALINFO);

 $token ='Bearer '.$access_token;

 $headers = [
     'Authorization' => $token,
     'Accept'        => 'application/json',
 ];

 Log::info('Request:', [

    'data' => $data
]);


$client = Client::findOrFail( $export->client_id);

$term = \App\Models\term::first();
$client->term_ar = $term->Conditionar;
$data =        $client->toArray();
//dd($data);
view()->share('data', $data);
$pdf = Pdf::loadView('test',['data' => $data] );

$fileName = $client->ud . '.pdf';
$pdf->save(public_path('pdf/' . $fileName));

$pdfContents = file_get_contents(asset($export->files));
$pdfContents2 = file_get_contents(asset('pdf/' . $fileName));
$pdfContents3 = file_get_contents(asset( $client->photo_ud_frent));
$pdfContents4 = file_get_contents(asset( $client->photo_ud_frent));


 try{



     $client2 = new ClientHTTP();
     $res = $client2->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/EXHRC_SUBMIT', [

         'headers' => $headers,
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
            'contents' => $pdfContents3, // PDF file contents
            'filename' => 'photo_ud_frent.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents4, // PDF file contents
            'filename' => 'photo_ud_back.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents2, // PDF file contents
            'filename' => $fileName, // Adjust the filename
        ],
        ],
     ]);
     $responseBody = $res->getBody()->getContents();
     $resp = json_decode($responseBody);

     $export->CER_SERIAL = $resp->CER_SERIAL;
     $export->accepted = 1;
     $export->save();

     $acceptation = new acceptation_demande();
     $acceptation->User_id = Auth()->user()->id;
     $acceptation->demande_id = $export->id;
     $acceptation->type = 'export';
     $acceptation->commenter = 'accepter';
     $acceptation->save();
 }catch(Exception $exception) {
    return back()->withInput()
    ->withErrors(['unexpected_error' => $exception->getMessage()]);
    return back()->withErrors($exception->getMessage());
 }





        return back();


     }




     public function acceptafter($id)
     {
        try{
         $export = export::findOrFail($id);
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

 $data['CER_TYPE'] = $export->CER_TYPE;
 $data['CER_LANG'] = $export->CER_LANG;
 $data['COMP_ID'] = $export->COMP_ID;
 $data['EUSER_QID'] = $export->EUSER_QID;
 $data['EXP_NAME'] = $export->EXP_NAME;
 $data['EXP_TEL'] = $export->EXP_TEL;
 $data['EXP_FAX'] = $export->EXP_FAX;
 $data['EXP_COUNTRY'] = $export->EXP_COUNTRY;
 $data['IMP_NAME'] = $export->IMP_NAME;
 $data['IMP_QID'] = $export->IMP_QID;
 $data['IMP_FAX'] = $export->IMP_FAX;
 $data['IMP_TEL'] = $export->IMP_TEL;
 $data['IMP_COUNTRY'] = $export->IMP_COUNTRY;
 $data['ORIGIN_COUNTRY'] = $export->ORIGIN_COUNTRY;
 $data['SHIPPING_PLACE'] = $export->SHIPPING_PLACE;
 $data['TRANSPORT'] = $export->TRANSPORT;

 $data['IMP_CER_SERIAL'] = $export->IMP_CER_SERIAL;
 $data['SHIPPING_DATE'] = $export->SHIPPING_DATE;
 $data['APPLICANT_NAME'] = $export->APPLICANT_NAME;
 $data['APPLICANT_TEL'] = 0;
 $data['EXP_NATIONALITY'] = $export->EXP_NATIONALITY;
 $data['EXP_PASSPORT_NUM'] = $export->EXP_PASSPORT_NUM;
 $data = json_encode($data);



 foreach ($export->animal as $key => $value) {



    $data1['ANML_NUMBER'] = $value->ANML_NUMBER;
    $data1['ANML_USE'] = "بعد مشاركه";





 }


 $token ='Bearer '.$access_token;

 $headers = [
     'Authorization' => $token,
     'Accept'        => 'application/json',
 ];


 $client = Client::findOrFail( $export->client_id);

 $term = \App\Models\term::first();
 $client->term_ar = $term->Conditionar;
 $data =        $client->toArray();
 //dd($data);
 view()->share('data', $data);
 $pdf = Pdf::loadView('test',['data' => $data] );

 $fileName = $client->ud . '.pdf';
 $pdf->save(public_path('pdf/' . $fileName));

 $pdfContents = file_get_contents(asset($export->files));
 $pdfContents2 = file_get_contents(asset('pdf/' . $fileName));
 $pdfContents3 = file_get_contents(asset( $client->photo_ud_frent));
 $pdfContents4 = file_get_contents(asset( $client->photo_ud_frent));






     $client2 = new ClientHTTP();
     $res = $client2->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/EXHRC_SUBMIT_AFTER_RACING', [

         'headers' => $headers,
         'multipart' => [
            [
                'name' => 'DATA',
                'contents' => $data,
            ],
            [
                'name' => 'ANIMAL_INFO',
                'contents' => json_encode($data1),
            ],
            [
            'name' => 'files[]',
            'contents' => $pdfContents3, // PDF file contents
            'filename' => 'photo_ud_frent.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents4, // PDF file contents
            'filename' => 'photo_ud_back.pdf', // Adjust the filename
        ],
        [
            'name' => 'files[]',
            'contents' => $pdfContents2, // PDF file contents
            'filename' => $fileName, // Adjust the filename
        ],
        ],
     ]);
     $responseBody = $res->getBody()->getContents();

     $resp = json_decode($responseBody);


     $export->CER_SERIAL = $resp->CER_SERIAL;
     $export->accepted = 1;
     $export->save();

     $acceptation = new acceptation_demande();
     $acceptation->User_id = Auth()->user()->id;
     $acceptation->demande_id = $export->id;
     $acceptation->type = 'export';
     $acceptation->commenter = 'accepter';
     $acceptation->save();
 }catch(Exception $exception) {
   // dd($exception);
    return back()->withInput()
                 ->withErrors(['unexpected_error' => $exception->getMessage()]);
    return back()->withErrors($exception->getMessage());
 }





        return back();


     }





     public function refuse($id,Request $request){
        $message = "تم رفض طلبك من اللجنة المنضمة لسباق الهجن و ذلك لسبب : ".$request->commenter;
        $export = export::findOrFail($id);
        $export->accepted = 0;
        $export->reson = $request->commenter;
$export->save();
    $acceptation = new acceptation_demande();
    $acceptation->User_id = Auth()->user()->id;
    $acceptation->demande_id = $export->id;
    $acceptation->type = 'export';
    $acceptation->commenter =  $message ;
    $acceptation->save();
    $sms = new Sms;
    $client = Client::find($export->client_id);

$contry = Contry::find($client->contry_id );
$sms->send($contry->phonecode.$client->phone,$message );
        return back();
    }

}
