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
                <h4 class="mt-5 mb-5">{{ trans('settings.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('settings.setting.create') }}" class="btn btn-success" title="{{ trans('settings.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($settings) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('settings.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('settings.being_established') }}</th>
                            <th>{{ trans('settings.commercial_register') }}</th>
                            <th>{{ trans('settings.phone') }}</th>
                            <th>{{ trans('settings.fax') }}</th>
                            <th>{{ trans('settings.email') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $setting)
                        <tr>
                            <td>{{ $setting->being_established }}</td>
                            <td>{{ $setting->commercial_register }}</td>
                            <td>{{ $setting->phone }}</td>
                            <td>{{ $setting->fax }}</td>
                            <td>{{ $setting->email }}</td>

                            <td>

                                <form method="POST" action="{!! route('settings.setting.destroy', $setting->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('settings.setting.show', $setting->id ) }}" class="btn btn-info" title="{{ trans('settings.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('settings.setting.edit', $setting->id ) }}" class="btn btn-primary" title="{{ trans('settings.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('settings.delete') }}" onclick="return confirm(&quot;{{ trans('settings.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $settings->render() !!}
        </div>

        @endif

    </div>
@endsection
