<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\Controller;
use App\Models\export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\ANIMAL_INFO;
use  App\Models\Setting;
use  App\Models\countries;
class ExportsController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $exports = export::where('client_id',auth()->user()->id)->get();

        $data = $exports->transform(function ($export) {
            return $this->transform($export);
        });

        return response()->json(  $data);
    }

    /**
     * Store a new export in the storage.
     *
     * @param \Illuminate\Http\Request $request
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

            $export = export::create($data);
            $animal = new ANIMAL_INFO();
            $animal->ORIGIN_COUNTRY = $request->ORIGIN_COUNTRYa;
            $animal->EXPORT_COUNTRY = $request->EXPORT_COUNTRYa;
            $animal->TRANSIET_COUNTRY = $request->TRANSIET_COUNTRYa;
            $animal->ANML_SPECIES = "ابل هجن";
            $animal->ANML_SEX = 'هجين';
            $animal->ANML_NUMBER = $request->ANML_NUMBER;
            if($request->IMP_CER_SERIAL != null){
                $animal->ANML_USE = "بعد مشاركه";
            }else{
                $animal->ANML_USE = 'مشاركة';
            }

            $animal->ANIMAL_BREED = "حسب الكشف المرفق";
            $animal->client_id =  auth()->user()->id ;
            $animal->save();
                $export->animal()->attach( $animal->id);

            return response()->json([

                'message' => 'success',
                'errors' => ''
            ]);
        } catch (Exception $exception) {
            return $this->errorResponse($exception->getMessage());
        }
    }

    /**
     * Display the specified export.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $export = export::with('client','comp')->findOrFail($id);

        return $this->successResponse(
		    trans('exports.model_was_retrieved'),
		    $this->transform($export)
		);
    }


    public function update($id, Request $request)
    {
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $export = export::findOrFail($id);
            $export->update($data);

            return $this->successResponse(
			    trans('exports.model_was_updated'),
			    $this->transform($export)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('exports.unexpected_error'));
        }
    }

    /**
     * Remove the specified export from the storage.
     *
     * @param int $id
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $export = export::findOrFail($id);
            $export->delete();

            return $this->successResponse(
			    trans('exports.model_was_deleted'),
			    $this->transform($export)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('exports.unexpected_error'));
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


            'EXP_COUNTRY' => 'string|nullable',
            'ORIGIN_COUNTRY' => 'string|nullable',
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'nullable|date_format:Y-m-d',
            'SHIPPING_DATE' => 'nullable|date_format:Y-m-d',
            'IMP_CER_SERIAL' => 'string|nullable',
            'files' => 'required',
            'Pledge' => 'nullable',

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
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'nullable|date_format:Y-m-d',
            'SHIPPING_DATE' => 'nullable|date_format:Y-m-d',
            'IMP_CER_SERIAL' => 'string|nullable',
            'files' => 'required',
            'Pledge' => 'nullable',



        ];


        $data = $request->validate($rules);

        $setting =  Setting::first();
        $contry =  countries::find(auth()->user()->contry);

        $data['COMP_ID'] =$setting->being_established;
        $data['EUSER_QID'] ='';
        $data['EXP_NAME'] ='Hijin';
        $data['EXP_TEL'] =$setting->phone;
        $data['IMP_QID'] =$setting->commercial_register;
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




        $data['CER_TYPE'] ='EXHRC';
        $data['CER_LANG'] ='A';
        $data['client_id'] = auth()->user()->id;
        $data['APPLICANT_NAME'] = '';
        $data['APPLICANT_TEL'] = '';
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


      //  $path = config('laravel-code-generator.files_upload_path', 'uploads');
        $saved = $file->store('pdf',['disk' => 'public_uploads']);

        return  $saved;
    }
    /**
     * Transform the giving export to public friendly array
     *
     * @param App\Models\export $export
     *
     * @return array
     */
    protected function transform(export $export)
    {
        return [
            'id' => $export->id,
            'client_id' => optional($export->client)->created_at,
            'CER_TYPE' => $export->CER_TYPE,
            'CER_LANG' => $export->CER_LANG,
            'COMP_ID' => $export->COMP_ID,
            'EUSER_QID' => $export->EUSER_QID,
            'EXP_NAME' => $export->EXP_NAME,
            'EXP_TEL' => $export->EXP_TEL,
            'EXP_FAX' => $export->EXP_FAX,
            'EXP_COUNTRY' => $export->EXP_COUNTRY,
            'IMP_NAME' => $export->IMP_NAME,
            'IMP_QID' => $export->IMP_QID,
            'IMP_FAX' => $export->IMP_FAX,
            'IMP_TEL' => $export->IMP_TEL,
            'IMP_COUNTRY' => $export->IMP_COUNTRY,
            'ORIGIN_COUNTRY' => $export->ORIGIN_COUNTRY,
            'SHIPPING_PLACE' => $export->SHIPPING_PLACE,
            'TRANSPORT' => $export->TRANSPORT,
            'SHIPPING_DATE' => $export->SHIPPING_DATE,
            'APPLICANT_NAME' => $export->APPLICANT_NAME,
            'APPLICANT_TEL' => $export->APPLICANT_TEL,
            'EXP_NATIONALITY' => $export->EXP_NATIONALITY,
            'EXP_PASSPORT_NUM' => $export->EXP_PASSPORT_NUM,
            'accepted' => $export->accepted,
            'animal' => $export->animal,

        ];
    }


}
