<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\api\Controller;
use App\Models\export;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Models\ANIMAL_INFO;
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

            $export = export::create($data);
            $ANIMAL_INFO = json_decode($data['ANIMAL_INFO'], true);

            foreach ($ANIMAL_INFO as $key => $value) {

                $animal = new ANIMAL_INFO();
                $animal->ANML_USE = $value['ANML_USE'];
                $animal->ANML_SEX = $value['ANML_SEX'];
                $animal->ANML_MICROCHIP = $value['ANML_MICROCHIP'];
                $animal->ANML_SPECIES = $value['ANML_SPECIES'];
                $animal->client_id =  auth()->user()->id ;
                $animal->save();
                $export->animal()->attach( $animal->id);
            }
            return $this->successResponse(
			    trans('exports.model_was_added'),
			    $this->transform($export)
			);
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

    /**
     * Update the specified export in the storage.
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

            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'string|min:1|nullable',
            'EXP_NAME' => 'string|min:1|nullable',
            'EXP_TEL' => 'string|min:1|nullable',
            'EXP_FAX' => 'string|min:1|nullable',
            'EXP_COUNTRY' => 'numeric|nullable',
            'IMP_NAME' => 'string|min:1|nullable',
            'IMP_QID' => 'string|min:1|nullable',
            'IMP_FAX' => 'string|min:1|nullable',
            'IMP_TEL' => 'string|min:1|nullable',
            'IMP_COUNTRY' => 'string|nullable',
            'ORIGIN_COUNTRY' => 'string|nullable',
            'SHIPPING_PLACE' => 'string|min:1|nullable',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'string',

            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'ANIMAL_INFO' => 'required'
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


            'COMP_ID' => 'required',
            'EUSER_QID' => 'string|min:1|required',
            'EXP_NAME' => 'string|min:1|required',
            'EXP_TEL' => 'string|min:1|required',
            'EXP_FAX' => 'string|min:1|required',
            'EXP_COUNTRY' => 'string|required',
            'IMP_NAME' => 'string|min:1|nullable',
            'IMP_QID' => 'string|min:1|nullable',
            'IMP_FAX' => 'string|min:1|nullable',
            'IMP_TEL' => 'string|min:1|nullable',
            'IMP_COUNTRY' => 'string|nullable',
            'ORIGIN_COUNTRY' => 'string|nullable',
            'SHIPPING_PLACE' => 'string|min:1|nullable',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'string|date_format:Y-m-d',

            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',

            'ANIMAL_INFO' => 'required',
            'files' => 'required',
        ];


        $data = $request->validate($rules);
        $data['CER_TYPE'] ='EXHRC';
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
