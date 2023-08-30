
<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-md-2 control-label">{{ trans('exports.client_id') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="client_id" name="client_id">
        	    <option value="" style="display: none;" {{ old('client_id', optional($export)->client_id ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('exports.client_id__placeholder') }}</option>
        	@foreach ($clients as $key => $client)
			    <option value="{{ $key }}" {{ old('client_id', optional($export)->client_id) == $key ? 'selected' : '' }}>
			    	{{ $client }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('client_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CER_TYPE') ? 'has-error' : '' }}">
    <label for="CER_TYPE" class="col-md-2 control-label">{{ trans('exports.CER_TYPE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_TYPE" type="text" id="CER_TYPE" value="{{ old('CER_TYPE', optional($export)->CER_TYPE) }}" minlength="1" placeholder="{{ trans('exports.CER_TYPE__placeholder') }}">
        {!! $errors->first('CER_TYPE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CER_LANG') ? 'has-error' : '' }}">
    <label for="CER_LANG" class="col-md-2 control-label">{{ trans('exports.CER_LANG') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="CER_LANG" type="text" id="CER_LANG" value="{{ old('CER_LANG', optional($export)->CER_LANG) }}" minlength="1" placeholder="{{ trans('exports.CER_LANG__placeholder') }}">
        {!! $errors->first('CER_LANG', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('COMP_ID') ? 'has-error' : '' }}">
    <label for="COMP_ID" class="col-md-2 control-label">{{ trans('exports.COMP_ID') }}</label>
    <div class="col-md-10">
        <select class="form-control" id="COMP_ID" name="COMP_ID">
        	    <option value="" style="display: none;" {{ old('COMP_ID', optional($export)->COMP_ID ?: '') == '' ? 'selected' : '' }} disabled selected>{{ trans('exports.COMP_ID__placeholder') }}</option>
        	@foreach ($cOMPs as $key => $cOMP)
			    <option value="{{ $key }}" {{ old('COMP_ID', optional($export)->COMP_ID) == $key ? 'selected' : '' }}>
			    	{{ $cOMP }}
			    </option>
			@endforeach
        </select>

        {!! $errors->first('COMP_ID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EUSER_QID') ? 'has-error' : '' }}">
    <label for="EUSER_QID" class="col-md-2 control-label">{{ trans('exports.EUSER_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EUSER_QID" type="text" id="EUSER_QID" value="{{ old('EUSER_QID', optional($export)->EUSER_QID) }}" minlength="1" placeholder="{{ trans('exports.EUSER_QID__placeholder') }}">
        {!! $errors->first('EUSER_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NAME') ? 'has-error' : '' }}">
    <label for="EXP_NAME" class="col-md-2 control-label">{{ trans('exports.EXP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NAME" type="text" id="EXP_NAME" value="{{ old('EXP_NAME', optional($export)->EXP_NAME) }}" minlength="1" placeholder="{{ trans('exports.EXP_NAME__placeholder') }}">
        {!! $errors->first('EXP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_TEL') ? 'has-error' : '' }}">
    <label for="EXP_TEL" class="col-md-2 control-label">{{ trans('exports.EXP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_TEL" type="text" id="EXP_TEL" value="{{ old('EXP_TEL', optional($export)->EXP_TEL) }}" minlength="1" placeholder="{{ trans('exports.EXP_TEL__placeholder') }}">
        {!! $errors->first('EXP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_FAX') ? 'has-error' : '' }}">
    <label for="EXP_FAX" class="col-md-2 control-label">{{ trans('exports.EXP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_FAX" type="text" id="EXP_FAX" value="{{ old('EXP_FAX', optional($export)->EXP_FAX) }}" minlength="1" placeholder="{{ trans('exports.EXP_FAX__placeholder') }}">
        {!! $errors->first('EXP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_COUNTRY') ? 'has-error' : '' }}">
    <label for="EXP_COUNTRY" class="col-md-2 control-label">{{ trans('exports.EXP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_COUNTRY" type="number" id="EXP_COUNTRY" value="{{ old('EXP_COUNTRY', optional($export)->EXP_COUNTRY) }}" placeholder="{{ trans('exports.EXP_COUNTRY__placeholder') }}">
        {!! $errors->first('EXP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_NAME') ? 'has-error' : '' }}">
    <label for="IMP_NAME" class="col-md-2 control-label">{{ trans('exports.IMP_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_NAME" type="text" id="IMP_NAME" value="{{ old('IMP_NAME', optional($export)->IMP_NAME) }}" minlength="1" placeholder="{{ trans('exports.IMP_NAME__placeholder') }}">
        {!! $errors->first('IMP_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_QID') ? 'has-error' : '' }}">
    <label for="IMP_QID" class="col-md-2 control-label">{{ trans('exports.IMP_QID') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_QID" type="text" id="IMP_QID" value="{{ old('IMP_QID', optional($export)->IMP_QID) }}" minlength="1" placeholder="{{ trans('exports.IMP_QID__placeholder') }}">
        {!! $errors->first('IMP_QID', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_FAX') ? 'has-error' : '' }}">
    <label for="IMP_FAX" class="col-md-2 control-label">{{ trans('exports.IMP_FAX') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_FAX" type="text" id="IMP_FAX" value="{{ old('IMP_FAX', optional($export)->IMP_FAX) }}" minlength="1" placeholder="{{ trans('exports.IMP_FAX__placeholder') }}">
        {!! $errors->first('IMP_FAX', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_TEL') ? 'has-error' : '' }}">
    <label for="IMP_TEL" class="col-md-2 control-label">{{ trans('exports.IMP_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_TEL" type="text" id="IMP_TEL" value="{{ old('IMP_TEL', optional($export)->IMP_TEL) }}" minlength="1" placeholder="{{ trans('exports.IMP_TEL__placeholder') }}">
        {!! $errors->first('IMP_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IMP_COUNTRY') ? 'has-error' : '' }}">
    <label for="IMP_COUNTRY" class="col-md-2 control-label">{{ trans('exports.IMP_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="IMP_COUNTRY" type="number" id="IMP_COUNTRY" value="{{ old('IMP_COUNTRY', optional($export)->IMP_COUNTRY) }}" placeholder="{{ trans('exports.IMP_COUNTRY__placeholder') }}">
        {!! $errors->first('IMP_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
    <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('exports.ORIGIN_COUNTRY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="ORIGIN_COUNTRY" type="number" id="ORIGIN_COUNTRY" value="{{ old('ORIGIN_COUNTRY', optional($export)->ORIGIN_COUNTRY) }}" placeholder="{{ trans('exports.ORIGIN_COUNTRY__placeholder') }}">
        {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_PLACE') ? 'has-error' : '' }}">
    <label for="SHIPPING_PLACE" class="col-md-2 control-label">{{ trans('exports.SHIPPING_PLACE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_PLACE" type="text" id="SHIPPING_PLACE" value="{{ old('SHIPPING_PLACE', optional($export)->SHIPPING_PLACE) }}" minlength="1" placeholder="{{ trans('exports.SHIPPING_PLACE__placeholder') }}">
        {!! $errors->first('SHIPPING_PLACE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('TRANSPORT') ? 'has-error' : '' }}">
    <label for="TRANSPORT" class="col-md-2 control-label">{{ trans('exports.TRANSPORT') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="TRANSPORT" type="text" id="TRANSPORT" value="{{ old('TRANSPORT', optional($export)->TRANSPORT) }}" minlength="1" placeholder="{{ trans('exports.TRANSPORT__placeholder') }}">
        {!! $errors->first('TRANSPORT', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('SHIPPING_DATE') ? 'has-error' : '' }}">
    <label for="SHIPPING_DATE" class="col-md-2 control-label">{{ trans('exports.SHIPPING_DATE') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="SHIPPING_DATE" type="text" id="SHIPPING_DATE" value="{{ old('SHIPPING_DATE', optional($export)->SHIPPING_DATE) }}" placeholder="{{ trans('exports.SHIPPING_DATE__placeholder') }}">
        {!! $errors->first('SHIPPING_DATE', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_NAME') ? 'has-error' : '' }}">
    <label for="APPLICANT_NAME" class="col-md-2 control-label">{{ trans('exports.APPLICANT_NAME') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_NAME" type="text" id="APPLICANT_NAME" value="{{ old('APPLICANT_NAME', optional($export)->APPLICANT_NAME) }}" minlength="1" placeholder="{{ trans('exports.APPLICANT_NAME__placeholder') }}">
        {!! $errors->first('APPLICANT_NAME', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('APPLICANT_TEL') ? 'has-error' : '' }}">
    <label for="APPLICANT_TEL" class="col-md-2 control-label">{{ trans('exports.APPLICANT_TEL') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="APPLICANT_TEL" type="text" id="APPLICANT_TEL" value="{{ old('APPLICANT_TEL', optional($export)->APPLICANT_TEL) }}" minlength="1" placeholder="{{ trans('exports.APPLICANT_TEL__placeholder') }}">
        {!! $errors->first('APPLICANT_TEL', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_NATIONALITY') ? 'has-error' : '' }}">
    <label for="EXP_NATIONALITY" class="col-md-2 control-label">{{ trans('exports.EXP_NATIONALITY') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_NATIONALITY" type="text" id="EXP_NATIONALITY" value="{{ old('EXP_NATIONALITY', optional($export)->EXP_NATIONALITY) }}" minlength="1" placeholder="{{ trans('exports.EXP_NATIONALITY__placeholder') }}">
        {!! $errors->first('EXP_NATIONALITY', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('exports.EXP_PASSPORT_NUM') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="EXP_PASSPORT_NUM" type="text" id="EXP_PASSPORT_NUM" value="{{ old('EXP_PASSPORT_NUM', optional($export)->EXP_PASSPORT_NUM) }}" minlength="1" placeholder="{{ trans('exports.EXP_PASSPORT_NUM__placeholder') }}">
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('accepted') ? 'has-error' : '' }}">
    <label for="accepted" class="col-md-2 control-label">{{ trans('exports.accepted') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="accepted" type="text" id="accepted" value="{{ old('accepted', optional($export)->accepted) }}" minlength="1" placeholder="{{ trans('exports.accepted__placeholder') }}">
        {!! $errors->first('accepted', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('reson') ? 'has-error' : '' }}">
    <label for="reson" class="col-md-2 control-label">{{ trans('exports.reson') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="reson" type="text" id="reson" value="{{ old('reson', optional($export)->reson) }}" minlength="1" placeholder="{{ trans('exports.reson__placeholder') }}">
        {!! $errors->first('reson', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('EXP_PASSPORT_NUM') ? 'has-error' : '' }}">
    <label for="EXP_PASSPORT_NUM" class="col-md-2 control-label">{{ trans('importations.animal') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="animal" type="number" id="animal" value="{{ old('animal', optional($export)->animal) }}" minlength="1" placeholder="" required>
        {!! $errors->first('EXP_PASSPORT_NUM', '<p class="help-block">:message</p>') !!}
    </div>
</div>

