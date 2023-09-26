
<input type="hidden" name="client_id" value="{{ auth()->guard('clientt')->user()->id }}">
@php

    $setting =  App\Models\Setting::first();
    $contry =  App\Models\countries::find(auth()->guard('clientt')->user()->contry);
@endphp
<input type="hidden" name="CER_TYPE" value="IMPRC">
<input type="hidden" name="CER_LANG" value="A">
<input type="hidden" name="COMP_ID" value="{{ $setting->being_established }}">
<input type="hidden" name="EUSER_QID" value="">
<input type="hidden" name="EXP_NAME" value="Hijin">
<input type="hidden" name="EXP_TEL" value="{{ $setting->phone }}">
<input type="hidden" name="EXP_QID" value="{{ $setting->commercial_register }}">
<input type="hidden" name="EXP_FAX" value="{{ $setting->fax }}">



<input type="hidden" name="IMP_NAME" value="{{ auth()->guard('clientt')->user()->first_name }} {{ auth()->guard('clientt')->user()->last_name }} ">
<input type="hidden" name="IMP_ADDRESS" value="{{ auth()->guard('clientt')->user()->adresse }}">
<input type="hidden" name="IMP_FAX" value="{{ auth()->guard('clientt')->user()->fax }}">
<input type="hidden" name="IMP_TEL" value="{{ auth()->guard('clientt')->user()->phone }}">
<input type="hidden" name="IMP_POBOX" value="{{ auth()->guard('clientt')->user()->POBOX }}">
<input type="hidden" name="IMP_COUNTRY" value="{{ $contry->name }}">

<input type="hidden" name="SHIPPING_PLACE" value="منفذ ابو سمرة">

<input type="hidden" name="APPLICANT_NAME" value="">
<input type="hidden" name="APPLICANT_TEL" value="{{ $setting->phone }}">
<input type="hidden" name="TRANSPORT" value="">

<input type="hidden" name="EXP_NATIONALITY" value="">
<input type="hidden" name="EXP_PASSPORT_NUM" value="">








<div class="form-group {{ $errors->has('EXP_COUNTRY') ? 'has-error' : '' }}">
    <label for="EXP_COUNTRY" class="col-md-2 control-label">{{ trans('importations.EXP_COUNTRY') }}</label>
    <div class="col-md-10">
        @php
        $countries =   App\Models\countries::where('active',1)->get();

        @endphp
                <select name="EXP_COUNTRY" id="EXP_COUNTRY"  class="form-control">
                    @foreach ($countries as $countrie)
                    <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
                    @endforeach
                </select>

                {!! $errors->first('EXP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>








<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('importations.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
        @php
$countries =   App\Models\countries::where('active',1)->get();

@endphp
        <select name="ORIGIN_COUNTRY" id="ORIGIN_COUNTRY"  class="form-control">
            @foreach ($countries as $countrie)
            <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
            @endforeach
        </select>
        {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>






<div class="form-group {{ $errors->has('ENTERY_PORT') ? 'has-error' : '' }}">
    <label for="ENTERY_PORT" class="col-md-2 control-label">{{ trans('importations.ENTERY_PORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ENTERY_PORT" type="text" id="ENTERY_PORT" value="{{ old('ENTERY_PORT', optional($importation)->ENTERY_PORT) }}" minlength="1" placeholder="{{ trans('importations.ENTERY_PORT__placeholder') }}">
        {!! $errors->first('ENTERY_PORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXPECTED_ARRIVAL_DATE') ? 'has-error' : '' }}">
    <label for="EXPECTED_ARRIVAL_DATE" class="col-md-2 control-label">{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXPECTED_ARRIVAL_DATE" type="date" id="EXPECTED_ARRIVAL_DATE" value="{{ old('EXPECTED_ARRIVAL_DATE', optional($importation)->EXPECTED_ARRIVAL_DATE) }}" placeholder="{{ trans('importations.EXPECTED_ARRIVAL_DATE__placeholder') }}">
        {!! $errors->first('EXPECTED_ARRIVAL_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('importations.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="date" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($importation)->SHIPPING_DATE) }}" placeholder="{{ trans('importations.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.files') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="files" type="file" id="files" value="{{ old('files', optional($importation)->files) }}" minlength="1" placeholder="{{ trans('importations.files') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.Pledge') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="Pledge" type="file" id="Pledge" value="{{ old('Pledge', optional($importation)->Pledge) }}" minlength="1" placeholder="{{ trans('importations.files') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<br><br><br><br>

{{-- <div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.animal') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="animal" type="number" id="animal" value="{{ old('animal', optional($importation)->animal) }}" minlength="1" placeholder="">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div> --}}

