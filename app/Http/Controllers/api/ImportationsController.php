<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\Controller;
use App\Models\importation as importations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\ANIMAL_INFO;
use Illuminate\Support\Facades\Log;

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

    /**
     * Store a new importations in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('Request:', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'headers' => $request->headers->all(),
            'body' => $request->all(),
        ]);

        try {


            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $importations = importations::create($data);

            $ANIMAL_INFO = json_decode($data['ANIMAL_INFO'], true);

            foreach ($ANIMAL_INFO as $key => $value) {

                $animal = new ANIMAL_INFO();
                $animal->ORIGIN_COUNTRY = $value['ORIGIN_COUNTRY'];
                $animal->EXPORT_COUNTRY = $value['EXPORT_COUNTRY'];
                $animal->TRANSIET_COUNTRY = $value['TRANSIET_COUNTRY'];
                $animal->ANML_SPECIES = $value['ANML_SPECIES'];
                $animal->ANML_SEX = $value['ANML_SEX'];
                $animal->ANML_NUMBER = $value['ANML_NUMBER'];
                $animal->ANML_USE = $value['ANML_USE'];
                $animal->ANIMAL_BREED = $value['ANIMAL_BREED'];
                $animal->client_id =  auth()->user()->id ;
                $animal->save();
                $importations->animal()->attach( $animal->id);
            }
            return response()->json([

                'message' => 'success',
                'errors' => ''
            ]);
        } catch (Exception $exception) {
            $importations->delete();
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
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
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

            'COMP_ID' => 'string',
            'EUSER_QID' => 'string|min:1',
            'EXP_NAME' => 'string|min:1',
            'EXP_TEL' => 'string|min:1',
            'EXP_QID' => 'string|min:1',
            'EXP_FAX' => 'string|min:1',
            'EXP_COUNTRY' => 'string',
            'IMP_NAME' => 'string|min:1',
            'IMP_ADDRESS' => 'string|min:1',
            'IMP_FAX' => 'string|min:1',
            'IMP_TEL' => 'string|min:1',
            'IMP_POBOX' => 'string|min:1',
            'IMP_COUNTRY' => 'string',
            'ORIGIN_COUNTRY' => 'string',
            'SHIPPING_PLACE' => 'string|min:1',
            'ENTERY_PORT' => 'string|min:1',
            'EXPECTED_ARRIVAL_DATE' => 'string|date_format:Y-m-d',
            'TRANSPORT' => 'string|min:1',
            'SHIPPING_DATE' => 'string|date_format:Y-m-d',
            'APPLICANT_NAME' => 'string|min:1',
            'APPLICANT_TEL' => 'string|min:1',
            'EXP_NATIONALITY' => 'string|min:1',
            'EXP_PASSPORT_NUM' => 'string|min:1',

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


            'COMP_ID' => 'string|min:1',
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
            'EXPECTED_ARRIVAL_DATE' => 'nullable|date_format:Y-m-d',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'nullable|date_format:Y-m-d',

            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'ANIMAL_INFO' => 'required',
            'files' => 'required',



        ];
        $validator = \Validator::make($request->all(),  $rules);
        if ($validator->fails()) {

            //pass validator errors as errors object for ajax response

            return response()->json([
                'id' => 0,
                'message' => $validator,
                'errors' => 'errors'
            ]);
        }

        $data = $request->validate($rules);
        $data['CER_TYPE'] ='IMPRC';
        $data['CER_LANG'] ='A';
        $data['client_id'] = auth()->user()->id;
        $data['APPLICANT_NAME'] = auth()->user()->first_name .' '.  auth()->user()->last_name;
        $data['APPLICANT_TEL'] = auth()->user()->phone;
        if ($request->hasFile('files')) {
            $data['files'] = $this->moveFile($request->file('files'));
        }


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
