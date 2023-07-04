<input type="hidden" name="client_id" value="{{ auth()->guard('clientt')->user()->id }}">

<div class="form-group {{ $errors->has('CER_TYPE') ? 'has-error' : '' }}">
    <label for="CER_TYPE" class="col-md-2 control-label">{{ trans('backs.CER_TYPE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_TYPE" type="text" id="CER_TYPE" value="{{ old('CER_TYPE', optional($back)->CER_TYPE) }}" minlength="1" placeholder="{{ trans('backs.CER_TYPE__placeholder') }}">
        {!! $errors->first('CER_TYPE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CER_LANG') ? 'has-error' : '' }}">
    <label for="CER_LANG" class="col-md-2 control-label">{{ trans('backs.CER_LANG') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_LANG" type="text" id="CER_LANG" value="{{ old('CER_LANG', optional($back)->CER_LANG) }}" minlength="1" placeholder="{{ trans('backs.CER_LANG__placeholder') }}">
        {!! $errors->first('CER_LANG', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('COMP_ID') ? 'has-error' : '' }}">
    <label for="COMP_ID" class="col-md-2 control-label">{{ trans('backs.COMP_ID') }}</label>
    <div class="col-md-10">
        <input type="text" class="form-control" id="COMP_ID" name="COMP_ID">


        {!! $errors->first('COMP_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EUSER_QID') ? 'has-error' : '' }}">
    <label for="EUSER_QID" class="col-md-2 control-label">{{ trans('backs.EUSER_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EUSER_QID" type="text" id="EUSER_QID" value="{{ old('EUSER_QID', optional($back)->EUSER_QID) }}" minlength="1" placeholder="{{ trans('backs.EUSER_QID__placeholder') }}">
        {!! $errors->first('EUSER_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NAME') ? 'has-error' : '' }}">
    <label for="EXP_NAME" class="col-md-2 control-label">{{ trans('backs.EXP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NAME" type="text" id="EXP_NAME" value="{{ old('EXP_NAME', optional($back)->EXP_NAME) }}" minlength="1" placeholder="{{ trans('backs.EXP_NAME__placeholder') }}">
        {!! $errors->first('EXP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_TEL') ? 'has-error' : '' }}">
    <label for="EXP_TEL" class="col-md-2 control-label">{{ trans('backs.EXP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_TEL" type="text" id="EXP_TEL" value="{{ old('EXP_TEL', optional($back)->EXP_TEL) }}" minlength="1" placeholder="{{ trans('backs.EXP_TEL__placeholder') }}">
        {!! $errors->first('EXP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_QID') ? 'has-error' : '' }}">
    <label for="EXP_QID" class="col-md-2 control-label">{{ trans('backs.EXP_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_QID" type="text" id="EXP_QID" value="{{ old('EXP_QID', optional($back)->EXP_QID) }}" minlength="1" placeholder="{{ trans('backs.EXP_QID__placeholder') }}">
        {!! $errors->first('EXP_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_FAX') ? 'has-error' : '' }}">
    <label for="EXP_FAX" class="col-md-2 control-label">{{ trans('backs.EXP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_FAX" type="text" id="EXP_FAX" value="{{ old('EXP_FAX', optional($back)->EXP_FAX) }}" minlength="1" placeholder="{{ trans('backs.EXP_FAX__placeholder') }}">
        {!! $errors->first('EXP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_COUNTRY') ? 'has-error' : '' }}">
    <label for="EXP_COUNTRY" class="col-md-2 control-label">{{ trans('backs.EXP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_COUNTRY" type="text" id="EXP_COUNTRY" value="{{ old('EXP_COUNTRY', optional($back)->EXP_COUNTRY) }}" placeholder="{{ trans('backs.EXP_COUNTRY__placeholder') }}">
        {!! $errors->first('EXP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_NAME') ? 'has-error' : '' }}">
    <label for="IMP_NAME" class="col-md-2 control-label">{{ trans('backs.IMP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_NAME" type="text" id="IMP_NAME" value="{{ old('IMP_NAME', optional($back)->IMP_NAME) }}" minlength="1" placeholder="{{ trans('backs.IMP_NAME__placeholder') }}">
        {!! $errors->first('IMP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_ADDRESS') ? 'has-error' : '' }}">
    <label for="IMP_ADDRESS" class="col-md-2 control-label">{{ trans('backs.IMP_ADDRESS') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_ADDRESS" type="text" id="IMP_ADDRESS" value="{{ old('IMP_ADDRESS', optional($back)->IMP_ADDRESS) }}" minlength="1" placeholder="{{ trans('backs.IMP_ADDRESS__placeholder') }}">
        {!! $errors->first('IMP_ADDRESS', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_FAX') ? 'has-error' : '' }}">
    <label for="IMP_FAX" class="col-md-2 control-label">{{ trans('backs.IMP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_FAX" type="text" id="IMP_FAX" value="{{ old('IMP_FAX', optional($back)->IMP_FAX) }}" minlength="1" placeholder="{{ trans('backs.IMP_FAX__placeholder') }}">
        {!! $errors->first('IMP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_TEL') ? 'has-error' : '' }}">
    <label for="IMP_TEL" class="col-md-2 control-label">{{ trans('backs.IMP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_TEL" type="text" id="IMP_TEL" value="{{ old('IMP_TEL', optional($back)->IMP_TEL) }}" minlength="1" placeholder="{{ trans('backs.IMP_TEL__placeholder') }}">
        {!! $errors->first('IMP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_POBOX') ? 'has-error' : '' }}">
    <label for="IMP_POBOX" class="col-md-2 control-label">{{ trans('backs.IMP_POBOX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_POBOX" type="text" id="IMP_POBOX" value="{{ old('IMP_POBOX', optional($back)->IMP_POBOX) }}" minlength="1" placeholder="{{ trans('backs.IMP_POBOX__placeholder') }}">
        {!! $errors->first('IMP_POBOX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_COUNTRY') ? 'has-error' : '' }}">
    <label for="IMP_COUNTRY" class="col-md-2 control-label">{{ trans('backs.IMP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_COUNTRY" type="text" id="IMP_COUNTRY" value="{{ old('IMP_COUNTRY', optional($back)->IMP_COUNTRY) }}" placeholder="{{ trans('backs.IMP_COUNTRY__placeholder') }}">
        {!! $errors->first('IMP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('backs.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ORIGIN_COUNTRY" type="text" id="ORIGIN_COUNTRY" value="{{ old('ORIGIN_COUNTRY', optional($back)->ORIGIN_COUNTRY) }}" placeholder="{{ trans('backs.ORIGIN_COUNTRY__placeholder') }}">
        {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_PLACE') ? 'has-error' : '' }}">
    <label for="SHIPPING_PLACE" class="col-md-2 control-label">{{ trans('backs.SHIPPING_PLACE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_PLACE" type="text" id="SHIPPING_PLACE" value="{{ old('SHIPPING_PLACE', optional($back)->SHIPPING_PLACE) }}" minlength="1" placeholder="{{ trans('backs.SHIPPING_PLACE__placeholder') }}">
        {!! $errors->first('SHIPPING_PLACE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ENTERY_PORT') ? 'has-error' : '' }}">
    <label for="ENTERY_PORT" class="col-md-2 control-label">{{ trans('backs.ENTERY_PORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ENTERY_PORT" type="text" id="ENTERY_PORT" value="{{ old('ENTERY_PORT', optional($back)->ENTERY_PORT) }}" minlength="1" placeholder="{{ trans('backs.ENTERY_PORT__placeholder') }}">
        {!! $errors->first('ENTERY_PORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXPECTED_ARRIVAL_DATE') ? 'has-error' : '' }}">
    <label for="EXPECTED_ARRIVAL_DATE" class="col-md-2 control-label">{{ trans('backs.EXPECTED_ARRIVAL_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXPECTED_ARRIVAL_DATE" type="text" id="EXPECTED_ARRIVAL_DATE" value="{{ old('EXPECTED_ARRIVAL_DATE', optional($back)->EXPECTED_ARRIVAL_DATE) }}" placeholder="{{ trans('backs.EXPECTED_ARRIVAL_DATE__placeholder') }}">
        {!! $errors->first('EXPECTED_ARRIVAL_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('TRANSPORT') ? 'has-error' : '' }}">
    <label for="TRANSPORT" class="col-md-2 control-label">{{ trans('backs.TRANSPORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSPORT" type="text" id="TRANSPORT" value="{{ old('TRANSPORT', optional($back)->TRANSPORT) }}" minlength="1" placeholder="{{ trans('backs.TRANSPORT__placeholder') }}">
        {!! $errors->first('TRANSPORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('backs.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="text" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($back)->SHIPPING_DATE) }}" placeholder="{{ trans('backs.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_NAME') ? 'has-error' : '' }}">
    <label for="APPLICANT_NAME" class="col-md-2 control-label">{{ trans('backs.APPLICANT_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_NAME" type="text" id="APPLICANT_NAME" value="{{ old('APPLICANT_NAME', optional($back)->APPLICANT_NAME) }}" minlength="1" placeholder="{{ trans('backs.APPLICANT_NAME__placeholder') }}">
        {!! $errors->first('APPLICANT_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_TEL') ? 'has-error' : '' }}">
    <label for="APPLICANT_TEL" class="col-md-2 control-label">{{ trans('backs.APPLICANT_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_TEL" type="text" id="APPLICANT_TEL" value="{{ old('APPLICANT_TEL', optional($back)->APPLICANT_TEL) }}" minlength="1" placeholder="{{ trans('backs.APPLICANT_TEL__placeholder') }}">
        {!! $errors->first('APPLICANT_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NATIONALITY') ? 'has-error' : '' }}">
    <label for="EXP_NATIONALITY" class="col-md-2 control-label">{{ trans('backs.EXP_NATIONALITY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NATIONALITY" type="text" id="EXP_NATIONALITY" value="{{ old('EXP_NATIONALITY', optional($back)->EXP_NATIONALITY) }}" minlength="1" placeholder="{{ trans('backs.EXP_NATIONALITY__placeholder') }}">
        {!! $errors->first('EXP_NATIONALITY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('backs.EXP_PASSPORT_NUM') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_PASSPORT_NUM" type="text" id="EXP_PASSPORT_NUM" value="{{ old('EXP_PASSPORT_NUM', optional($back)->EXP_PASSPORT_NUM) }}" minlength="1" placeholder="{{ trans('backs.EXP_PASSPORT_NUM__placeholder') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('accepted') ? 'has-error' : '' }}">
    <label for="accepted" class="col-md-2 control-label">{{ trans('backs.accepted') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="accepted" type="text" id="accepted" value="{{ old('accepted', optional($back)->accepted) }}" minlength="1" placeholder="{{ trans('backs.accepted__placeholder') }}">
        {!! $errors->first('accepted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reson') ? 'has-error' : '' }}">
    <label for="reson" class="col-md-2 control-label">{{ trans('backs.reson') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="reson" type="text" id="reson" value="{{ old('reson', optional($back)->reson) }}" minlength="1" placeholder="{{ trans('backs.reson__placeholder') }}">
        {!! $errors->first('reson', '<p class="help-block">:message</p>') !!}
    </div>
</div>

