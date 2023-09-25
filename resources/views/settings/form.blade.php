
<div class="form-group {{ $errors->has('being_established') ? 'has-error' : '' }}">
    <label for="being_established" class="col-md-2 control-label">{{ trans('settings.being_established') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="being_established" type="text" id="being_established" value="{{ old('being_established', optional($setting)->being_established) }}" minlength="1" placeholder="{{ trans('settings.being_established__placeholder') }}">
        {!! $errors->first('being_established', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('commercial_register') ? 'has-error' : '' }}">
    <label for="commercial_register" class="col-md-2 control-label">{{ trans('settings.commercial_register') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="commercial_register" type="text" id="commercial_register" value="{{ old('commercial_register', optional($setting)->commercial_register) }}" minlength="1" placeholder="{{ trans('settings.commercial_register__placeholder') }}">
        {!! $errors->first('commercial_register', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
    <label for="phone" class="col-md-2 control-label">{{ trans('settings.phone') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phone" type="text" id="phone" value="{{ old('phone', optional($setting)->phone) }}" minlength="1" placeholder="{{ trans('settings.phone__placeholder') }}">
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('fax') ? 'has-error' : '' }}">
    <label for="fax" class="col-md-2 control-label">{{ trans('settings.fax') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="fax" type="text" id="fax" value="{{ old('fax', optional($setting)->fax) }}" minlength="1" placeholder="{{ trans('settings.fax__placeholder') }}">
        {!! $errors->first('fax', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">{{ trans('settings.email') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="email" type="email" id="email" value="{{ old('email', optional($setting)->email) }}" placeholder="{{ trans('settings.email__placeholder') }}">
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

