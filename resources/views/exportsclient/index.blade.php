@extends('layouts.appclient')

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
                <h4 class="mt-5 mb-5">{{ trans('exports.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('exports.client.create') }}" class="btn btn-success" title="{{ trans('exports.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($exports) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('exports.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table align-items-center mb-0" style="   "  id="table">
                    <thead>
                        <tr>
                            {{-- <th>{{ trans('exports.client_id') }}</th>
                            <th>{{ trans('exports.CER_TYPE') }}</th>
                            <th>{{ trans('exports.CER_LANG') }}</th> --}}
                            <th>{{ trans('exports.COMP_ID') }}</th>

                            <th>{{ trans('exports.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('exports.SHIPPING_PLACE') }}</th>

                            <th>{{ trans('exports.SHIPPING_DATE') }}</th>



                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($exports as $export)
                        <tr>
                            {{-- <td>{{ optional($export->client)->ud }}</td>
                            <td>{{ $export->CER_TYPE }}</td>
                            <td>{{ $export->CER_LANG }}</td> --}}
                            <td>{{ $export->COMP_ID }}</td>

                            <td>{{ $export->ORIGIN_COUNTRY }}</td>
                            <td>{{ $export->SHIPPING_PLACE }}</td>

                            <td>{{ $export->SHIPPING_DATE }}</td>

                          <td></td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>



        @endif

    </div>
@endsection
