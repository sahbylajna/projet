@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Setting' }}</h4>
            </div>

        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('settings.setting.update', $setting->id) }}" id="edit_setting_form" name="edit_setting_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('settings.form', [
                                        'setting' => $setting,
                                      ])

<br><br>
<div class="form-group">
    <div class="col-md-offset-2 col-md-10" style="    text-align-last: center;">
                        <input class="btn btn-primary" type="submit" value="{{ trans('settings.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
