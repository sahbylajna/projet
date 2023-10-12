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
                <h4 class="mt-5 mb-5">{{ trans('importations.after') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('importations.after.client.create') }}" class="btn btn-success" title="{{ trans('importations.after') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($importations) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('importations.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table align-items-center mb-0" style="   "  id="table">
                    <thead>
                        <tr>

                            <th>{{ trans('importations.EXP_COUNTRY') }}</th>

                            <th>{{ trans('importations.ORIGIN_COUNTRY') }}</th>

                            <th>{{ trans('importations.ENTERY_PORT') }}</th>
                            <th>{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</th>

                            <th>{{ trans('importations.SHIPPING_DATE') }}</th>

                            {{-- <th>{{ trans('importations.accepted') }}</th>
                            <th>{{ trans('importations.reson') }}</th> --}}

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($importations as $importation)
                        <tr>
                            {{-- <td>{{ optional($importation->client)->created_at }}</td>
                            <td>{{ $importation->CER_TYPE }}</td>
                            <td>{{ $importation->CER_LANG }}</td> --}}

                            <td>{{ $importation->EXP_COUNTRY }}</td>

                            <td>{{ $importation->ORIGIN_COUNTRY }}</td>

                            <td>{{ $importation->ENTERY_PORT }}</td>
                            <td>{{ $importation->EXPECTED_ARRIVAL_DATE }}</td>

                            <td>{{ $importation->SHIPPING_DATE }}</td>


                            <td>



                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">

        </div>

        @endif

    </div>
@endsection
