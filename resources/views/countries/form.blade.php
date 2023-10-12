
<div class="form-group {{ $errors->has('iso') ? 'has-error' : '' }}">
    <label for="iso" class="col-md-2 control-label">{{ trans('countries.iso') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="iso" type="text" id="iso" value="{{ old('iso', optional($countries)->iso) }}" minlength="1" maxlength="2" required="true" placeholder="{{ trans('countries.iso__placeholder') }}">
        {!! $errors->first('iso', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">{{ trans('countries.name') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($countries)->name) }}" minlength="1" maxlength="80" required="true" placeholder="{{ trans('countries.name__placeholder') }}">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('iso3') ? 'has-error' : '' }}">
    <label for="iso3" class="col-md-2 control-label">{{ trans('countries.iso3') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="iso3" type="text" id="iso3" value="{{ old('iso3', optional($countries)->iso3) }}" maxlength="3" placeholder="{{ trans('countries.iso3__placeholder') }}">
        {!! $errors->first('iso3', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('numcode') ? 'has-error' : '' }}">
    <label for="numcode" class="col-md-2 control-label">{{ trans('countries.numcode') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="numcode" type="text" id="numcode" value="{{ old('numcode', optional($countries)->numcode) }}" min="-32768" max="32767" placeholder="{{ trans('countries.numcode__placeholder') }}">
        {!! $errors->first('numcode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phonecode') ? 'has-error' : '' }}">
    <label for="phonecode" class="col-md-2 control-label">{{ trans('countries.phonecode') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="phonecode" type="number" id="phonecode" value="{{ old('phonecode', optional($countries)->phonecode) }}" min="-2147483648" max="2147483647" required="true" placeholder="{{ trans('countries.phonecode__placeholder') }}">
        {!! $errors->first('phonecode', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('active') ? 'has-error' : '' }}">
    <label for="active" class="col-md-2 control-label">{{ trans('countries.active') }}</label>
    <div class="col-md-10">
        <input class="form-control" name="active" type="text" id="active" value="{{ old('active', optional($countries)->active) }}" minlength="1" maxlength="255" required="true" placeholder="{{ trans('countries.active__placeholder') }}">
        {!! $errors->first('active', '<p class="help-block">:message</p>') !!}
    </div>
</div>

