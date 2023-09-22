<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Client;
use App\Models\back;
use App\Models\ANIMAL_INFO;
use Illuminate\Http\Request;
use Exception;
use App\Models\acceptation_demande;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as ClientHTTP;
use App\Models\ApiUser;
class BacksController extends Controller
{

    /**
     * Display a listing of the backs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $backs = back::with('client')->paginate(25);

        return view('backs.index', compact('backs'));
    }

    /**
     * Show the form for creating a new back.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('backs.create', compact('clients'));
    }

    /**
     * Store a new back in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {

            $data = $this->getData($request);

            back::create($data);

            return redirect()->route('backs.back.index')
                ->with('success_message', trans('backs.model_was_added'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
        }
    }

    /**
     * Display the specified back.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $back = back::with('client')->findOrFail($id);

        return view('backs.show', compact('back'));
    }

    /**
     * Show the form for editing the specified back.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $back = back::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();

        return view('backs.edit', compact('back','clients'));
    }

    /**
     * Update the specified back in the storage.
     *
     * @param int $id
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        try {

            $data = $this->getData($request);

            $back = back::findOrFail($id);
            $back->update($data);

            return redirect()->route('backs.back.index')
                ->with('success_message', trans('backs.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
        }
    }

    /**
     * Remove the specified back from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $back = back::findOrFail($id);
            $back->delete();

            return redirect()->route('backs.back.index')
                ->with('success_message', trans('backs.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
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
                'client_id' => 'nullable',
            'CER_TYPE' => 'string|min:1|nullable',
            'CER_LANG' => 'string|min:1|nullable',
            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'string|min:1|nullable',
            'EXP_NAME' => 'string|min:1|nullable',
            'EXP_TEL' => 'string|min:1|nullable',
            'EXP_QID' => 'string|min:1|nullable',
            'EXP_FAX' => 'string|min:1|nullable',
            'EXP_COUNTRY' => 'string|nullable',
            'IMP_NAME' => 'string|min:1|nullable',
            'IMP_ADDRESS' => 'string|min:1|nullable',
            'IMP_FAX' => 'string|min:1|nullable',
            'IMP_TEL' => 'string|min:1|nullable',
            'IMP_POBOX' => 'string|min:1|nullable',
            'IMP_COUNTRY' => 'string|nullable',
            'ORIGIN_COUNTRY' => 'string|nullable',
            'SHIPPING_PLACE' => 'string|min:1|nullable',
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'string|nullable',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'string|nullable',
            'APPLICANT_NAME' => 'string|min:1|nullable',
            'APPLICANT_TEL' => 'string|min:1|nullable',
            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'accepted' => 'string|min:1|nullable',
            'reson' => 'string|min:1|nullable',
            'ANIMAL_INFO' => 'required'

        ];


        $data = $request->validate($rules);

        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }


        return $data;
    }



    public function indexclient()
    {

        $backs = back::where('client_id',auth()->guard('clientt')->user()->id)->get();

        return view('backsclient.index', compact('backs'));
    }



     /**
     * Show the form for creating a new back.
     *
     * @return \Illuminate\View\View
     */
    public function createclient()
    {
        $clients = Client::pluck('ud','id')->all();


        return view('backsclient.create', compact('clients'));
    }

    /**
     * Store a new back in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function storeclient(Request $request)
    {
        try {

            $data = $this->getData($request);



          $back =  back::create($data);

          foreach ($request->ORIGIN_COUNTRYa as $key => $animale) {
            $animal = new ANIMAL_INFO();
            $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRYa[$key];
            $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRY[$key];
            $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRY[$key];

            $animal->client_id =  auth()->guard('clientt')->user()->id ;
            $animal->save();
            $back->animal()->attach( $animal->id);

          }





            return redirect()->route('backs.client.index')
                ->with('success_message', trans('backs.model_was_added'));
        } catch (Exception $exception) {
dd($exception);
            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
        }
    }

    /**
     * Display the specified back.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function showclient($id)
    {
        $back = back::with('client','comp')->findOrFail($id);

        return view('backsclient.show', compact('back'));
    }

    /**
     * Show the form for editing the specified back.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function editclient($id)
    {
        $back = back::findOrFail($id);
        $clients = Client::pluck('ud','id')->all();


        return view('backsclient.edit', compact('back','clients'));
    }

    /**
     * Update the specified back in the storage.
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

            $back = back::findOrFail($id);
            $back->update($data);

            return redirect()->route('backs.client.index')
                ->with('success_message', trans('backs.model_was_updated'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
        }
    }

    /**
     * Remove the specified back from the storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse | \Illuminate\Routing\Redirector
     */
    public function destroyclient($id)
    {
        try {
            $back = back::findOrFail($id);
            $back->delete();

            return redirect()->route('backs.client.index')
                ->with('success_message', trans('backs.model_was_deleted'));
        } catch (Exception $exception) {

            return back()->withInput()
                ->withErrors(['unexpected_error' => trans('backs.unexpected_error')]);
        }
    }


    public function accept($id)
    {
        $back = back::findOrFail($id);
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

$data['CER_TYPE'] = $back->CER_TYPE;
$data['CER_LANG'] = $back->CER_LANG;
$data['COMP_ID'] = $back->COMP_ID;
$data['EUSER_QID'] = $back->EUSER_QID;
$data['EXP_NAME'] = $back->EXP_NAME;
$data['EXP_TEL'] = $back->EXP_TEL;
$data['EXP_QID'] = $back->EXP_QID;
$data['EXP_FAX'] = $back->EXP_FAX;
$data['EXP_COUNTRY'] = $back->EXP_COUNTRY;
$data['IMP_NAME'] = $back->IMP_NAME;
$data['IMP_ADDRESS'] = $back->IMP_ADDRESS;
$data['IMP_FAX'] = $back->IMP_FAX;
$data['IMP_TEL'] = $back->IMP_TEL;
$data['IMP_POBOX'] = $back->IMP_POBOX;
$data['IMP_COUNTRY'] = $back->IMP_COUNTRY;
$data['ORIGIN_COUNTRY'] = $back->ORIGIN_COUNTRY;
$data['SHIPPING_PLACE'] = $back->SHIPPING_PLACE;
$data['ENTERY_PORT'] = $back->ENTERY_PORT;
$data['EXPECTED_ARRIVAL_DATE'] = $back->EXPECTED_ARRIVAL_DATE;
$data['TRANSPORT'] = $back->TRANSPORT;
$data['SHIPPING_DATE'] = $back->SHIPPING_DATE;
$data['APPLICANT_NAME'] = $back->APPLICANT_NAME;
$data['APPLICANT_TEL'] = $back->APPLICANT_TEL;
$data['EXP_NATIONALITY'] = $back->EXP_NATIONALITY;
$data['EXP_PASSPORT_NUM'] = $back->EXP_PASSPORT_NUM;
$data = json_encode($data);
$ANIMALINFO = [];

foreach ($back->animal as $key => $value) {

    $data1['EXPORT_COUNTRY'] = $value->EXPORT_COUNTRY;
    $data1['ORIGIN_COUNTRY'] = $value->ORIGIN_COUNTRY;
    $data1['TRANSIET_COUNTRY'] = $value->TRANSIET_COUNTRY;

    $ANIMALINFO[$key] = $data1;


}

$ANIMALINFOj = json_encode($ANIMALINFO);




$token ='Bearer '.$access_token;

$headers = [
    'Authorization' => $token,
    'Accept'        => 'application/json',
];



try{
    $client2 = new ClientHTTP();
    $res = $client2->request('POST', 'https://animalcert.mme.gov.qa/HIJIN_API/api/data/IMPLC_SUBMIT_AFTER_RACING', [
        'form_params' => [
            'DATA' => $data,
            'ANIMAL_INFO' =>$ANIMALINFOj,
            'files' => $back->files,
        ],
        'headers' => $headers
    ]);


    $acceptation = new acceptation_demande();
    $acceptation->User_id = Auth()->user()->id;
    $acceptation->demande_id = $back->id;
    $acceptation->type = 'importation';
    $acceptation->commenter = 'accepter';
    $acceptation->save();
}catch(Exception $exception) {
dd($exception);
}

       dd($res->getBody());
       $response = (string) $res->getBody();
       $response =json_decode($response);




       return back();



    }







}
