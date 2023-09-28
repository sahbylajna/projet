@php

    $setting =  App\Models\Setting::first();

@endphp
<input type="hidden" name="CER_TYPE" value="IMPRC">
<input type="hidden" name="CER_LANG" value="A">
<input type="hidden" name="COMP_ID" value="{{ $setting->being_established }}">
<input type="hidden" name="EUSER_QID" value="">
<input type="hidden" name="EXP_NAME" value="Hijin">
<input type="hidden" name="EXP_TEL" value="{{ $setting->phone }}">
<input type="hidden" name="EXP_QID" value="{{ $setting->commercial_register }}">
<input type="hidden" name="EXP_FAX" value="{{ $setting->fax }}">





<input type="hidden" name="SHIPPING_PLACE" value="منفذ ابو سمرة">

<input type="hidden" name="APPLICANT_NAME" value="">
<input type="hidden" name="APPLICANT_TEL" value="{{ $setting->phone }}">
<input type="hidden" name="TRANSPORT" value="">

<input type="hidden" name="EXP_NATIONALITY" value="">
<input type="hidden" name="EXP_PASSPORT_NUM" value="">







<div class="form-group {{ $errors->has('EUSER_QID') ? 'has-error' : '' }}">
    <label for="EUSER_QID" class="col-md-2 control-label">{{ trans('importations.EUSER_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EUSER_QID" type="text" id="EUSER_QID" value="{{ old('EUSER_QID', optional($importation)->EUSER_QID) }}" minlength="1" placeholder="{{ trans('importations.EUSER_QID__placeholder') }}">
        {!! $errors->first('EUSER_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>


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


<div class="form-group {{ $errors->has('IMP_NAME') ? 'has-error' : '' }}">
    <label for="IMP_NAME" class="col-md-2 control-label">{{ trans('importations.IMP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_NAME" type="text" id="IMP_NAME" value="{{ old('IMP_NAME', optional($importation)->IMP_NAME) }}" minlength="1" placeholder="{{ trans('importations.IMP_NAME__placeholder') }}">
        {!! $errors->first('IMP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('IMP_TEL') ? 'has-error' : '' }}">
    <label for="IMP_TEL" class="col-md-2 control-label">{{ trans('importations.IMP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_TEL" type="text" id="IMP_TEL" value="{{ old('IMP_TEL', optional($importation)->IMP_TEL) }}" minlength="1" placeholder="{{ trans('importations.IMP_TEL__placeholder') }}">
        {!! $errors->first('IMP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('IMP_COUNTRY') ? 'has-error' : '' }}">
    <label for="IMP_COUNTRY" class="col-md-2 control-label">{{ trans('importations.IMP_COUNTRY') }}</label>
    <div class="col-md-10">
        {!! $errors->first('IMP_COUNTRY', '<p class="help-block">:message</p>') !!}
        <select name="IMP_COUNTRY" id="IMP_COUNTRY"  class="form-control">
            @foreach ($countries as $countrie)
            <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
            @endforeach
        </select>

    </div>
</div>

<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('importations.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
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

<div class="form-group {{ $errors->has('TRANSPORT') ? 'has-error' : '' }}">
    <label for="TRANSPORT" class="col-md-2 control-label">{{ trans('importations.TRANSPORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSPORT" type="text" id="TRANSPORT" value="{{ old('TRANSPORT', optional($importation)->TRANSPORT) }}" minlength="1" placeholder="{{ trans('importations.TRANSPORT__placeholder') }}">
        {!! $errors->first('TRANSPORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('importations.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="date" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($importation)->SHIPPING_DATE) }}" placeholder="{{ trans('importations.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_NAME') ? 'has-error' : '' }}">
    <label for="APPLICANT_NAME" class="col-md-2 control-label">{{ trans('importations.APPLICANT_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_NAME" type="text" id="APPLICANT_NAME" value="{{ old('APPLICANT_NAME', optional($importation)->APPLICANT_NAME) }}" minlength="1" placeholder="{{ trans('importations.APPLICANT_NAME__placeholder') }}">
        {!! $errors->first('APPLICANT_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_TEL') ? 'has-error' : '' }}">
    <label for="APPLICANT_TEL" class="col-md-2 control-label">{{ trans('importations.APPLICANT_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_TEL" type="text" id="APPLICANT_TEL" value="{{ old('APPLICANT_TEL', optional($importation)->APPLICANT_TEL) }}" minlength="1" placeholder="{{ trans('importations.APPLICANT_TEL__placeholder') }}">
        {!! $errors->first('APPLICANT_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NATIONALITY') ? 'has-error' : '' }}">
    <label for="EXP_NATIONALITY" class="col-md-2 control-label">{{ trans('importations.EXP_NATIONALITY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NATIONALITY" type="text" id="EXP_NATIONALITY" value="{{ old('EXP_NATIONALITY', optional($importation)->EXP_NATIONALITY) }}" minlength="1" placeholder="{{ trans('importations.EXP_NATIONALITY__placeholder') }}">
        {!! $errors->first('EXP_NATIONALITY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.EXP_PASSPORT_NUM') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_PASSPORT_NUM" type="text" id="EXP_PASSPORT_NUM" value="{{ old('EXP_PASSPORT_NUM', optional($importation)->EXP_PASSPORT_NUM) }}" minlength="1" placeholder="{{ trans('importations.EXP_PASSPORT_NUM__placeholder') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
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
