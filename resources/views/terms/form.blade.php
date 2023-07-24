
<div class="form-group {{ $errors->has('term_ar') ? 'has-error' : '' }}">
    <label for="term_ar" class="col-md-2 control-label">{{ trans('terms.term_ar') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="term_ar" type="text" id="term_ar" value="" minlength="1" placeholder="{{ trans('terms.term_ar__placeholder') }}">{{ old('term_ar', optional($term)->term_ar) }} </textarea>
        {!! $errors->first('term_ar', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('term_en') ? 'has-error' : '' }}">
    <label for="term_en" class="col-md-2 control-label">{{ trans('terms.term_en') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="term_en" type="text" id="term_en" value="" minlength="1" placeholder="{{ trans('terms.term_en__placeholder') }}"> {{ old('term_en', optional($term)->term_en) }} </textarea>
        {!! $errors->first('term_en', '<p class="help-block">:message</p>') !!}
    </div>
</div>
