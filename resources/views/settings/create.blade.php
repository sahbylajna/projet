@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('settings.create') }}</h4>
            </span>



        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('settings.setting.store') }}" accept-charset="UTF-8" id="create_setting_form" name="create_setting_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('settings.form', [
                                        'setting' => null,
                                      ])
<br><br>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10" style="    text-align-last: center;">
                        <input class="btn btn-primary" type="submit" value="{{ trans('settings.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


