<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\Controller;
use App\Models\back;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

use App\Models\ANIMAL_INFO;

class BacksController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $backs = back::where('client_id',auth()->user()->id)->with('animal')->get();

        $data = $backs->transform(function ($back) {
            return $this->transform($back);
        });

        return response()->json(  $data);
    }

    /**
     * Store a new back in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $back = back::create($data);
            $ANIMAL_INFO = json_decode($data['ANIMAL_INFO'], true);

            foreach ($ANIMAL_INFO as $key => $value) {

                $animal = new ANIMAL_INFO();
                $animal->ORIGIN_COUNTRY = $value['ORIGIN_COUNTRY'];
                $animal->EXPORT_COUNTRY = $value['EXPORT_COUNTRY'];
                $animal->TRANSIET_COUNTRY = $value['TRANSIET_COUNTRY'];

                $animal->client_id =  auth()->user()->id ;
                $animal->save();
                $back->animal()->attach( $animal->id);
            }









            return $this->successResponse(
			    trans('backs.model_was_added'),
			    $this->transform($back)
			);
        } catch (Exception $exception) {
           // $back->delete();
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * Display the specified back.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $back = back::with('client','comp')->findOrFail($id);

        return $this->successResponse(
		    trans('backs.model_was_retrieved'),
		    $this->transform($back)
		);
    }

    /**
     * Update the specified back in the storage.
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

            $back = back::findOrFail($id);
            $back->update($data);

            return $this->successResponse(
			    trans('backs.model_was_updated'),
			    $this->transform($back)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('backs.unexpected_error'));
        }
    }

    /**
     * Remove the specified back from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $back = back::findOrFail($id);
            $back->delete();

            return $this->successResponse(
			    trans('backs.model_was_deleted'),
			    $this->transform($back)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('backs.unexpected_error'));
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
            'CER_TYPE' => 'string|min:1',
            'CER_LANG' => 'string|min:1',
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
            'EXPECTED_ARRIVAL_DATE|date_format:Y-m-d' => 'string',
            'TRANSPORT' => 'string|min:1',
            'SHIPPING_DATE' => 'string|date_format:Y-m-d',
            'APPLICANT_NAME' => 'string|min:1',
            'APPLICANT_TEL' => 'string|min:1',
            'EXP_NATIONALITY' => 'string|min:1',
            'EXP_PASSPORT_NUM' => 'string|min:1',
            'animal' => 'string',

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
            'EXPECTED_ARRIVAL_DATE' => 'string|date_format:Y-m-d',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'string|date_format:Y-m-d',

            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'animal' => 'string',

        ];


        $data = $request->validate($rules);
        $data['CER_TYPE'] ='IMPLC';
        $data['CER_LANG'] ='A';
        $data['client_id'] = auth()->user()->id;
        $data['APPLICANT_NAME'] = auth()->user()->first_name .' '.  auth()->user()->last_name;
        $data['APPLICANT_TEL'] = auth()->user()->phone;



        return $data;
    }

    /**
     * Transform the giving back to public friendly array
     *
     * @param App\Models\back $back
     *
     * @return array
     */
    protected function transform(back $back)
    {

        return [
            'id' => $back->id,
            'client_id' => optional($back->client)->id,
            'CER_TYPE' => $back->CER_TYPE,
            'CER_LANG' => $back->CER_LANG,
            'COMP_ID' =>  $back->COMP_ID,
            'EUSER_QID' => $back->EUSER_QID,
            'EXP_NAME' => $back->EXP_NAME,
            'EXP_TEL' => $back->EXP_TEL,
            'EXP_QID' => $back->EXP_QID,
            'EXP_FAX' => $back->EXP_FAX,
            'EXP_COUNTRY' => $back->EXP_COUNTRY,
            'IMP_NAME' => $back->IMP_NAME,
            'IMP_ADDRESS' => $back->IMP_ADDRESS,
            'IMP_FAX' => $back->IMP_FAX,
            'IMP_TEL' => $back->IMP_TEL,
            'IMP_POBOX' => $back->IMP_POBOX,
            'IMP_COUNTRY' => $back->IMP_COUNTRY,
            'ORIGIN_COUNTRY' => $back->ORIGIN_COUNTRY,
            'SHIPPING_PLACE' => $back->SHIPPING_PLACE,
            'ENTERY_PORT' => $back->ENTERY_PORT,
            'EXPECTED_ARRIVAL_DATE' => $back->EXPECTED_ARRIVAL_DATE,
            'TRANSPORT' => $back->TRANSPORT,
            'SHIPPING_DATE' => $back->SHIPPING_DATE,
            'APPLICANT_NAME' => $back->APPLICANT_NAME,
            'APPLICANT_TEL' => $back->APPLICANT_TEL,
            'EXP_NATIONALITY' => $back->EXP_NATIONALITY,
            'EXP_PASSPORT_NUM' => $back->EXP_PASSPORT_NUM,
            'accepted' => $back->accepted,
            'animal' => $back->animal,

        ];
    }


}
