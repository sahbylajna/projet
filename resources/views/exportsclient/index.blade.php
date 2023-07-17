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

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            {{-- <th>{{ trans('exports.client_id') }}</th>
                            <th>{{ trans('exports.CER_TYPE') }}</th>
                            <th>{{ trans('exports.CER_LANG') }}</th> --}}
                            <th>{{ trans('exports.COMP_ID') }}</th>
                            <th>{{ trans('exports.EUSER_QID') }}</th>
                            <th>{{ trans('exports.EXP_NAME') }}</th>
                            <th>{{ trans('exports.EXP_TEL') }}</th>
                            <th>{{ trans('exports.EXP_FAX') }}</th>
                            <th>{{ trans('exports.EXP_COUNTRY') }}</th>
                            <th>{{ trans('exports.IMP_NAME') }}</th>
                            <th>{{ trans('exports.IMP_QID') }}</th>
                            <th>{{ trans('exports.IMP_FAX') }}</th>
                            <th>{{ trans('exports.IMP_TEL') }}</th>
                            <th>{{ trans('exports.IMP_COUNTRY') }}</th>
                            <th>{{ trans('exports.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('exports.SHIPPING_PLACE') }}</th>
                            <th>{{ trans('exports.TRANSPORT') }}</th>
                            <th>{{ trans('exports.SHIPPING_DATE') }}</th>
                            <th>{{ trans('exports.APPLICANT_NAME') }}</th>
                            <th>{{ trans('exports.APPLICANT_TEL') }}</th>
                            <th>{{ trans('exports.EXP_NATIONALITY') }}</th>
                            <th>{{ trans('exports.EXP_PASSPORT_NUM') }}</th>


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
                            <td>{{ $export->EUSER_QID }}</td>
                            <td>{{ $export->EXP_NAME }}</td>
                            <td>{{ $export->EXP_TEL }}</td>
                            <td>{{ $export->EXP_FAX }}</td>
                            <td>{{ $export->EXP_COUNTRY }}</td>
                            <td>{{ $export->IMP_NAME }}</td>
                            <td>{{ $export->IMP_QID }}</td>
                            <td>{{ $export->IMP_FAX }}</td>
                            <td>{{ $export->IMP_TEL }}</td>
                            <td>{{ $export->IMP_COUNTRY }}</td>
                            <td>{{ $export->ORIGIN_COUNTRY }}</td>
                            <td>{{ $export->SHIPPING_PLACE }}</td>
                            <td>{{ $export->TRANSPORT }}</td>
                            <td>{{ $export->SHIPPING_DATE }}</td>
                            <td>{{ $export->APPLICANT_NAME }}</td>
                            <td>{{ $export->APPLICANT_TEL }}</td>
                            <td>{{ $export->EXP_NATIONALITY }}</td>
                            <td>{{ $export->EXP_PASSPORT_NUM }}</td>
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
