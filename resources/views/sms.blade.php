@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">SMS</h4>
            </div>


        </div>


        <div class="panel-body panel-body-with-table">

            <form action="{{ route('sendsms') }}"  accept-charset="UTF-8"  method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name" class="col-md-2 control-label">{{ trans('clients.model_plural') }}</label>
                    <div class="col-md-10">
                      <select name="phone" id="phone"  class="form-control js-example-basic-single">
                        @foreach (App\Models\Client::all() as  $user)
                        @php
                            $contry = App\Models\countries::find($user->contry_id );
                        @endphp
                        <option style="    display: block;
                        width: 100%;
                        padding: 0.5rem 0;
                        font-size: 0.9rem;
                        font-weight: 400;
                        line-height: 2.5rem;
                        color: #495057;
                        background-color: rgba(0, 0, 0, 0.1);" value="{{ $contry->phonecode }}{{ $user->phone }}">{{ $user->ud }}</option>
                        @endforeach

                      </select>
                    </div>
                </div>


                <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name" class="col-md-2 control-label">{{ trans('sms.text') }}</label>
                    <div class="col-md-10">
                     <input type="text" name="message" id="message"  class="form-control">
                    </div>
                </div>

                <div class="btn-group btn-group-sm pull-right" role="group">
                    <button type="submit" class="btn btn-success" title="{{ trans('users.create') }}">
                      {{ trans('sms.send')  }}
                    </button>
                </div>


            </form>
        </div>




    </div>
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('js')

    <script>
        $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
    </script>
@endsection
