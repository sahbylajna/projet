<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\Controller;
use App\Models\importation as importations;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\ANIMAL_INFO;
use Illuminate\Support\Facades\Log;
use  App\Models\Setting;
use  App\Models\countries;

class ImportationsController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {

        $importationsObjects = importations::where('client_id',auth()->user()->id)->get();

       $data  = $importationsObjects->transform(function ($importations) {
            return $this->transform($importations);
        });

        return response()->json(  $data);
    }

    public function store(Request $request)
    {

        try {


            $validator = $this->getValidator($request);


            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $importations = importations::create($data);



                $animal = new ANIMAL_INFO();
                $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRYa;
                $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRYa;
                $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRYa;
                $animal->ANML_SPECIES = "ابل هجن";
                $animal->ANML_SEX = 'هجين';
                $animal->ANML_NUMBER = $request->ANML_NUMBER;
                $animal->ANML_USE = 'مشاركة';
                $animal->ANIMAL_BREED = "حسب الكشف المرفق";
                $animal->client_id =  auth()->user()->id ;
                $animal->save();
                $importations->animal()->attach( $animal->id);

            return response()->json([

                'message' => 'success',
                'errors' => ''
            ]);
        } catch (Exception $exception) {
            return response()->json([

                'message' => '',
                'errors' => $exception->getMessage()
            ]);
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * Display the specified importations.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $importations = importations::with('client','comp')->findOrFail($id);

        return $this->successResponse(
		    trans('importations.model_was_retrieved'),
		    $this->transform($importations)
		);
    }

    /**
     * Update the specified importations in the storage.
     *
     * @param int $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $importations = importations::findOrFail($id);
            $importations->update($data);

            return $this->successResponse(
			    trans('importations.model_was_updated'),
			    $this->transform($importations)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('importations.unexpected_error'));
        }
    }

    /**
     * Remove the specified importations from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $importations = importations::findOrFail($id);
            $importations->delete();

            return $this->successResponse(
			    trans('importations.model_was_deleted'),
			    $this->transform($importations)
			);
        } catch (Exception $exception) {
            return $this->errorResponse( $exception->getMessage());
        }
    }

    /**
     * Gets a new validator instance with the defined rules.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Support\Facades\Validator
     */
    protected function getValidator(Request $request)
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
            'ORIGIN_COUNTRY' => 'nullable|string',
            'SHIPPING_PLACE' => 'nullable|string|min:1',
            'ENTERY_PORT' => 'nullable|string|min:1',
            'EXPECTED_ARRIVAL_DATE' => 'nullable|string|date_format:Y-m-d',
            'TRANSPORT' => 'nullable|string|min:1',
            'SHIPPING_DATE' => 'nullable|string|date_format:Y-m-d',
            'APPLICANT_NAME' => 'nullable|string|min:1',
            'APPLICANT_TEL' => 'nullable|string|min:1',
            'EXP_NATIONALITY' => 'nullable|string|min:1',
            'EXP_PASSPORT_NUM' => 'nullable|string|min:1',

        ];

        return Validator::make($request->all(), $rules);
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

            'EXP_COUNTRY' => 'string|nullable',
            'ORIGIN_COUNTRY' => 'string|nullable',
            'EXPORT_COUNTRYa' => 'string|nullable',
            'ORIGIN_COUNTRYa' => 'string|nullable',
            'TRANSIET_COUNTRYa' => 'string|min:1|nullable',
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'nullable|date_format:Y-m-d',
            'SHIPPING_DATE' => 'nullable|date_format:Y-m-d',
            'EXP_CER_SERIAL' => 'string|nullable',
            'files' => 'required|nullable',
            'Pledge' => 'nullable',



        ];


        $validator = \Validator::make($request->all(),  $rules);
        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json([
                'id' => 0,
                'message' =>  $request->validate($rules),
                'errors' => 'errors'
            ]);
        }

        $data = $request->validate($rules);

        $setting =  Setting::first();
        $contry =  countries::find(auth()->user()->contry);

        $data['COMP_ID'] =$setting->being_established;
        $data['EUSER_QID'] ='';
        $data['EXP_NAME'] ='Hijin';
        $data['EXP_TEL'] =$setting->phone;
        $data['EXP_QID'] =$setting->commercial_register;
        $data['EXP_FAX'] =$setting->fax;

        $data['IMP_NAME'] =auth()->user()->first_name .' '. auth()->user()->last_name;
        $data['IMP_ADDRESS'] =auth()->user()->adresse;
        $data['IMP_FAX'] =auth()->user()->fax;
        $data['IMP_TEL'] =auth()->user()->phone;
        $data['IMP_POBOX'] =auth()->user()->POBOX;
        $data['IMP_COUNTRY'] = $contry->name;

        $data['SHIPPING_PLACE'] ="منفذ ابو سمرة";
        $data['APPLICANT_NAME'] ='';
        $data['APPLICANT_TEL'] =$setting->phone;
        $data['TRANSPORT'] ='';
        $data['EXP_NATIONALITY'] ='';
        $data['EXP_PASSPORT_NUM'] ='';




        $data['CER_TYPE'] ='IMPRC';
        $data['CER_LANG'] ='A';
        $data['client_id'] = auth()->user()->id;
        $data['APPLICANT_NAME'] = '';
        $data['APPLICANT_TEL'] = '';
        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }

        $client =auth()->user();

$term = \App\Models\term::first();
$client->term_ar = $term->Conditionar;
$data =$client->toArray();
//dd($data);
view()->share('data', $data);
$pdf = Pdf::loadView('test',['data' => $data] );

$fileName = $client->ud . '.pdf';
$pdf->save(public_path('pdf/' . $fileName));
$data['Pledge'] =$fileName;



        return $data;

    }
    protected function moveFile($file)
    {


      //  $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('pdf',['disk' => 'public_uploads']);

        return  $saved;
    }
    /**
     * Transform the giving importations to public friendly array
     *
     * @param App\Models\importations $importations
     *
     * @return array
     */
    protected function transform(importations $importations)
    {
        return [
            'id' => $importations->id,
            'client_id' => auth()->user()->id,
            'CER_TYPE' => $importations->CER_TYPE,
            'CER_LANG' => $importations->CER_LANG,
            'COMP_ID' => $importations->COMP_ID,
            'EUSER_QID' => $importations->EUSER_QID,
            'EXP_NAME' => $importations->EXP_NAME,
            'EXP_TEL' => $importations->EXP_TEL,
            'EXP_QID' => $importations->EXP_QID,
            'EXP_FAX' => $importations->EXP_FAX,
            'EXP_COUNTRY' => $importations->EXP_COUNTRY,
            'IMP_NAME' => $importations->IMP_NAME,
            'IMP_ADDRESS' => $importations->IMP_ADDRESS,
            'IMP_FAX' => $importations->IMP_FAX,
            'IMP_TEL' => $importations->IMP_TEL,
            'IMP_POBOX' => $importations->IMP_POBOX,
            'IMP_COUNTRY' => $importations->IMP_COUNTRY,
            'ORIGIN_COUNTRY' => $importations->ORIGIN_COUNTRY,
            'SHIPPING_PLACE' => $importations->SHIPPING_PLACE,
            'ENTERY_PORT' => $importations->ENTERY_PORT,
            'EXPECTED_ARRIVAL_DATE' => $importations->EXPECTED_ARRIVAL_DATE,
            'TRANSPORT' => $importations->TRANSPORT,
            'SHIPPING_DATE' => $importations->SHIPPING_DATE,
            'APPLICANT_NAME' => $importations->APPLICANT_NAME,
            'APPLICANT_TEL' => $importations->APPLICANT_TEL,
            'EXP_NATIONALITY' => $importations->EXP_NATIONALITY,
            'EXP_PASSPORT_NUM' => $importations->EXP_PASSPORT_NUM,
            'accepted' => $importations->accepted,
            'animal' => $importations->animal,

        ];
    }


}
