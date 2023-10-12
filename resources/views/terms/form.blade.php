
<div class="form-group {{ $errors->has('term_ar') ? 'has-error' : '' }}">
    <label for="term_ar" class="col-md-2 control-label">{{ trans('terms.term_ar') }}</label>
    <div class="col-md-10">



        {{-- <textarea class="form-control" name="term_ar" type="text" id="term_ar" value="" minlength="1" placeholder="{{ trans('terms.term_ar__placeholder') }}">{{ old('term_ar', optional($term)->term_ar) }} </textarea> --}}
        <div id="editor" name="">
            {!! old('term_ar', optional($term)->term_ar) !!}

        </div>
        <textarea style="display: none" id="description" name="term_ar" > {!! old('term_ar', optional($term)->term_ar) !!}</textarea>





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


<div id="editor2" name="">
    {!! old('Conditionar', optional($term)->Conditionar) !!}

</div>
<textarea style="display: none" id="Conditionar" name="Conditionar" > {!! old('term_ar', optional($term)->Conditionar) !!}</textarea>








<div class="form-group {{ $errors->has('Conditionen') ? 'has-error' : '' }}">
    <label for="Conditionen" class="col-md-2 control-label">{{ trans('terms.Conditionen') }}</label>
    <div class="col-md-10">
        <textarea class="form-control" name="Conditionen" type="text" id="Conditionen" value="" minlength="1" placeholder="{{ trans('terms.Conditionen__placeholder') }}"> {{ old('Conditionen', optional($term)->Conditionen) }} </textarea>
        {!! $errors->first('Conditionen', '<p class="help-block">:message</p>') !!}
    </div>
</div>




