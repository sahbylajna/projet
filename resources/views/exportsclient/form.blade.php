<input type="hidden" name="client_id" value="{{ auth()->guard('clientt')->user()->id }}">

<input type="hidden" name="CER_TYPE" value="EXHCC">
<input type="hidden" name="CER_LANG" value="A">

<div class="form-group {{ $errors->has('COMP_ID') ? 'has-error' : '' }}">
    <label for="COMP_ID" class="col-md-2 control-label">{{ trans('back.COMP_ID') }}</label>
    <div class="col-md-10">
        <input type="text" class="form-control" id="COMP_ID" name="COMP_ID">


        {!! $errors->first('COMP_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EUSER_QID') ? 'has-error' : '' }}">
    <label for="EUSER_QID" class="col-md-2 control-label">{{ trans('back.EUSER_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EUSER_QID" type="text" id="EUSER_QID" value="{{ old('EUSER_QID', optional($export)->EUSER_QID) }}" minlength="1" placeholder="{{ trans('back.EUSER_QID__placeholder') }}">
        {!! $errors->first('EUSER_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NAME') ? 'has-error' : '' }}">
    <label for="EXP_NAME" class="col-md-2 control-label">{{ trans('back.EXP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NAME" type="text" id="EXP_NAME" value="{{ old('EXP_NAME', optional($export)->EXP_NAME) }}" minlength="1" placeholder="{{ trans('back.EXP_NAME__placeholder') }}">
        {!! $errors->first('EXP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_TEL') ? 'has-error' : '' }}">
    <label for="EXP_TEL" class="col-md-2 control-label">{{ trans('back.EXP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_TEL" type="text" id="EXP_TEL" value="{{ old('EXP_TEL', optional($export)->EXP_TEL) }}" minlength="1" placeholder="{{ trans('back.EXP_TEL__placeholder') }}">
        {!! $errors->first('EXP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_FAX') ? 'has-error' : '' }}">
    <label for="EXP_FAX" class="col-md-2 control-label">{{ trans('back.EXP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_FAX" type="text" id="EXP_FAX" value="{{ old('EXP_FAX', optional($export)->EXP_FAX) }}" minlength="1" placeholder="{{ trans('back.EXP_FAX__placeholder') }}">
        {!! $errors->first('EXP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_COUNTRY') ? 'has-error' : '' }}">
    <label for="EXP_COUNTRY" class="col-md-2 control-label">{{ trans('back.EXP_COUNTRY') }}</label>
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
    <label for="IMP_NAME" class="col-md-2 control-label">{{ trans('back.IMP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_NAME" type="text" id="IMP_NAME" value="{{ old('IMP_NAME', optional($export)->IMP_NAME) }}" minlength="1" placeholder="{{ trans('back.IMP_NAME__placeholder') }}">
        {!! $errors->first('IMP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_QID') ? 'has-error' : '' }}">
    <label for="IMP_QID" class="col-md-2 control-label">{{ trans('back.IMP_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_QID" type="text" id="IMP_QID" value="{{ old('IMP_QID', optional($export)->IMP_QID) }}" minlength="1" placeholder="{{ trans('back.IMP_QID__placeholder') }}">
        {!! $errors->first('IMP_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_FAX') ? 'has-error' : '' }}">
    <label for="IMP_FAX" class="col-md-2 control-label">{{ trans('back.IMP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_FAX" type="text" id="IMP_FAX" value="{{ old('IMP_FAX', optional($export)->IMP_FAX) }}" minlength="1" placeholder="{{ trans('back.IMP_FAX__placeholder') }}">
        {!! $errors->first('IMP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_TEL') ? 'has-error' : '' }}">
    <label for="IMP_TEL" class="col-md-2 control-label">{{ trans('back.IMP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_TEL" type="text" id="IMP_TEL" value="{{ old('IMP_TEL', optional($export)->IMP_TEL) }}" minlength="1" placeholder="{{ trans('back.IMP_TEL__placeholder') }}">
        {!! $errors->first('IMP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_COUNTRY') ? 'has-error' : '' }}">
    <label for="IMP_COUNTRY" class="col-md-2 control-label">{{ trans('back.IMP_COUNTRY') }}</label>
    <div class="col-md-10">
        @php
        $countries =   App\Models\countries::where('active',1)->get();

        @endphp
                <select name="IMP_COUNTRY" id="IMP_COUNTRY"  class="form-control">
                    @foreach ($countries as $countrie)
                    <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
                    @endforeach
                </select>
                 {!! $errors->first('IMP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('back.ORIGIN_COUNTRY') }}</label>
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

<div class="form-group {{ $errors->has('SHIPPING_PLACE') ? 'has-error' : '' }}">
    <label for="SHIPPING_PLACE" class="col-md-2 control-label">{{ trans('back.SHIPPING_PLACE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_PLACE" type="text" id="SHIPPING_PLACE" value="{{ old('SHIPPING_PLACE', optional($export)->SHIPPING_PLACE) }}" minlength="1" placeholder="{{ trans('back.SHIPPING_PLACE__placeholder') }}">
        {!! $errors->first('SHIPPING_PLACE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('TRANSPORT') ? 'has-error' : '' }}">
    <label for="TRANSPORT" class="col-md-2 control-label">{{ trans('back.TRANSPORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSPORT" type="text" id="TRANSPORT" value="{{ old('TRANSPORT', optional($export)->TRANSPORT) }}" minlength="1" placeholder="{{ trans('back.TRANSPORT__placeholder') }}">
        {!! $errors->first('TRANSPORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('back.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="date" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($export)->SHIPPING_DATE) }}" placeholder="{{ trans('back.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_NAME') ? 'has-error' : '' }}">
    <label for="APPLICANT_NAME" class="col-md-2 control-label">{{ trans('back.APPLICANT_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_NAME" type="text" id="APPLICANT_NAME" value="{{ old('APPLICANT_NAME', optional($export)->APPLICANT_NAME) }}" minlength="1" placeholder="{{ trans('back.APPLICANT_NAME__placeholder') }}">
        {!! $errors->first('APPLICANT_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_TEL') ? 'has-error' : '' }}">
    <label for="APPLICANT_TEL" class="col-md-2 control-label">{{ trans('back.APPLICANT_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_TEL" type="text" id="APPLICANT_TEL" value="{{ old('APPLICANT_TEL', optional($export)->APPLICANT_TEL) }}" minlength="1" placeholder="{{ trans('back.APPLICANT_TEL__placeholder') }}">
        {!! $errors->first('APPLICANT_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NATIONALITY') ? 'has-error' : '' }}">
    <label for="EXP_NATIONALITY" class="col-md-2 control-label">{{ trans('back.EXP_NATIONALITY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NATIONALITY" type="text" id="EXP_NATIONALITY" value="{{ old('EXP_NATIONALITY', optional($export)->EXP_NATIONALITY) }}" minlength="1" placeholder="{{ trans('back.EXP_NATIONALITY__placeholder') }}">
        {!! $errors->first('EXP_NATIONALITY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('back.EXP_PASSPORT_NUM') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_PASSPORT_NUM" type="text" id="EXP_PASSPORT_NUM" value="{{ old('EXP_PASSPORT_NUM', optional($export)->EXP_PASSPORT_NUM) }}" minlength="1" placeholder="{{ trans('back.EXP_PASSPORT_NUM__placeholder') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>


