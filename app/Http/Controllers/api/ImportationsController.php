<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\Controller;
use App\Models\importations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class ImportationsController extends Controller
{

    /**
     * Display a listing of the assets.
     *
     * @return Illuminate\View\View
     */
    public function index()
    {
        $importationsObjects = importations::with('client')->paginate(25);

        $data = $importationsObjects->transform(function ($importations) {
            return $this->transform($importations);
        });

        return $this->successResponse(
            trans('importations.models_were_retrieved'),
            $data,
            [
                'links' => [
                    'first' => $importationsObjects->url(1),
                    'last' => $importationsObjects->url($importationsObjects->lastPage()),
                    'prev' => $importationsObjects->previousPageUrl(),
                    'next' => $importationsObjects->nextPageUrl(),
                ],
                'meta' =>
                [
                    'current_page' => $importationsObjects->currentPage(),
                    'from' => $importationsObjects->firstItem(),
                    'last_page' => $importationsObjects->lastPage(),
                    'path' => $importationsObjects->resolveCurrentPath(),
                    'per_page' => $importationsObjects->perPage(),
                    'to' => $importationsObjects->lastItem(),
                    'total' => $importationsObjects->total(),
                ],
            ]
        );
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
        try {
            $validator = $this->getValidator($request);

            if ($validator->fails()) {
                return $this->errorResponse($validator->errors()->all());
            }

            $data = $this->getData($request);

            $importations = importations::create($data);

            return $this->successResponse(
			    trans('importations.model_was_added'),
			    $this->transform($importations)
			);
        } catch (Exception $exception) {
            return $this->errorResponse(trans('importations.unexpected_error'));
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
            return $this->errorResponse(trans('importations.unexpected_error'));
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
            'CER_TYPE' => 'string|min:1|nullable',
            'CER_LANG' => 'string|min:1|nullable',
            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'string|min:1|nullable',
            'EXP_NAME' => 'string|min:1|nullable',
            'EXP_TEL' => 'string|min:1|nullable',
            'EXP_QID' => 'string|min:1|nullable',
            'EXP_FAX' => 'string|min:1|nullable',
            'EXP_COUNTRY' => 'numeric|nullable',
            'IMP_NAME' => 'string|min:1|nullable',
            'IMP_ADDRESS' => 'string|min:1|nullable',
            'IMP_FAX' => 'string|min:1|nullable',
            'IMP_TEL' => 'string|min:1|nullable',
            'IMP_POBOX' => 'string|min:1|nullable',
            'IMP_COUNTRY' => 'numeric|nullable',
            'ORIGIN_COUNTRY' => 'numeric|nullable',
            'SHIPPING_PLACE' => 'string|min:1|nullable',
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'date_format:j/n/Y|nullable',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'date_format:j/n/Y|nullable',
            'APPLICANT_NAME' => 'string|min:1|nullable',
            'APPLICANT_TEL' => 'string|min:1|nullable',
            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'accepted' => 'string|min:1|nullable',
            'reson' => 'string|min:1|nullable',
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
                'client_id' => 'nullable',
            'CER_TYPE' => 'string|min:1|nullable',
            'CER_LANG' => 'string|min:1|nullable',
            'COMP_ID' => 'nullable',
            'EUSER_QID' => 'string|min:1|nullable',
            'EXP_NAME' => 'string|min:1|nullable',
            'EXP_TEL' => 'string|min:1|nullable',
            'EXP_QID' => 'string|min:1|nullable',
            'EXP_FAX' => 'string|min:1|nullable',
            'EXP_COUNTRY' => 'numeric|nullable',
            'IMP_NAME' => 'string|min:1|nullable',
            'IMP_ADDRESS' => 'string|min:1|nullable',
            'IMP_FAX' => 'string|min:1|nullable',
            'IMP_TEL' => 'string|min:1|nullable',
            'IMP_POBOX' => 'string|min:1|nullable',
            'IMP_COUNTRY' => 'numeric|nullable',
            'ORIGIN_COUNTRY' => 'numeric|nullable',
            'SHIPPING_PLACE' => 'string|min:1|nullable',
            'ENTERY_PORT' => 'string|min:1|nullable',
            'EXPECTED_ARRIVAL_DATE' => 'date_format:j/n/Y|nullable',
            'TRANSPORT' => 'string|min:1|nullable',
            'SHIPPING_DATE' => 'date_format:j/n/Y|nullable',
            'APPLICANT_NAME' => 'string|min:1|nullable',
            'APPLICANT_TEL' => 'string|min:1|nullable',
            'EXP_NATIONALITY' => 'string|min:1|nullable',
            'EXP_PASSPORT_NUM' => 'string|min:1|nullable',
            'accepted' => 'string|min:1|nullable',
            'reson' => 'string|min:1|nullable',
        ];


        $data = $request->validate($rules);




        return $data;
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
            'client_id' => optional($importations->client)->created_at,
            'CER_TYPE' => $importations->CER_TYPE,
            'CER_LANG' => $importations->CER_LANG,
            'COMP_ID' => optional($importations->cOMP)->id,
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
            'reson' => $importations->reson,
        ];
    }


}
