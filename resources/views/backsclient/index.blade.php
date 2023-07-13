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
                <h4 class="mt-5 mb-5">{{ trans('backs.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('backs.client.create') }}" class="btn btn-success" title="{{ trans('backs.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($backs) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('backs.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            {{-- <th>{{ trans('backs.client_id') }}</th>
                            <th>{{ trans('backs.CER_TYPE') }}</th>
                            <th>{{ trans('backs.CER_LANG') }}</th> --}}
                            <th>{{ trans('backs.COMP_ID') }}</th>
                            <th>{{ trans('backs.EUSER_QID') }}</th>
                            <th>{{ trans('backs.EXP_NAME') }}</th>
                            <th>{{ trans('backs.EXP_TEL') }}</th>
                            <th>{{ trans('backs.EXP_QID') }}</th>
                            <th>{{ trans('backs.EXP_FAX') }}</th>
                            <th>{{ trans('backs.EXP_COUNTRY') }}</th>
                            <th>{{ trans('backs.IMP_NAME') }}</th>
                            <th>{{ trans('backs.IMP_ADDRESS') }}</th>
                            <th>{{ trans('backs.IMP_FAX') }}</th>
                            <th>{{ trans('backs.IMP_TEL') }}</th>
                            <th>{{ trans('backs.IMP_POBOX') }}</th>
                            <th>{{ trans('backs.IMP_COUNTRY') }}</th>
                            <th>{{ trans('backs.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('backs.SHIPPING_PLACE') }}</th>
                            <th>{{ trans('backs.ENTERY_PORT') }}</th>
                            <th>{{ trans('backs.EXPECTED_ARRIVAL_DATE') }}</th>
                            <th>{{ trans('backs.TRANSPORT') }}</th>
                            <th>{{ trans('backs.SHIPPING_DATE') }}</th>
                            <th>{{ trans('backs.APPLICANT_NAME') }}</th>
                            <th>{{ trans('backs.APPLICANT_TEL') }}</th>
                            <th>{{ trans('backs.EXP_NATIONALITY') }}</th>
                            <th>{{ trans('backs.EXP_PASSPORT_NUM') }}</th>
                            <th>{{ trans('backs.accepted') }}</th>
                            <th>{{ trans('backs.reson') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($backs as $back)
                        <tr>
                            {{-- <td>{{ optional($back->client)->ud }}</td>
                            <td>{{ $back->CER_TYPE }}</td>
                            <td>{{ $back->CER_LANG }}</td> --}}
                            <td>{{ $back->COMP_ID }}</td>
                            <td>{{ $back->EUSER_QID }}</td>
                            <td>{{ $back->EXP_NAME }}</td>
                            <td>{{ $back->EXP_TEL }}</td>
                            <td>{{ $back->EXP_QID }}</td>
                            <td>{{ $back->EXP_FAX }}</td>
                            <td>{{ $back->EXP_COUNTRY }}</td>
                            <td>{{ $back->IMP_NAME }}</td>
                            <td>{{ $back->IMP_ADDRESS }}</td>
                            <td>{{ $back->IMP_FAX }}</td>
                            <td>{{ $back->IMP_TEL }}</td>
                            <td>{{ $back->IMP_POBOX }}</td>
                            <td>{{ $back->IMP_COUNTRY }}</td>
                            <td>{{ $back->ORIGIN_COUNTRY }}</td>
                            <td>{{ $back->SHIPPING_PLACE }}</td>
                            <td>{{ $back->ENTERY_PORT }}</td>
                            <td>{{ $back->EXPECTED_ARRIVAL_DATE }}</td>
                            <td>{{ $back->TRANSPORT }}</td>
                            <td>{{ $back->SHIPPING_DATE }}</td>
                            <td>{{ $back->APPLICANT_NAME }}</td>
                            <td>{{ $back->APPLICANT_TEL }}</td>
                            <td>{{ $back->EXP_NATIONALITY }}</td>
                            <td>{{ $back->EXP_PASSPORT_NUM }}</td>
                            <td>{{ $back->accepted }}</td>
                            <td>{{ $back->reson }}</td>

                            <td>

                                <form method="POST" action="{!! route('backs.back.destroy', $back->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        {{-- <a href="{{ route('backs.back.show', $back->id ) }}" class="btn btn-info" title="{{ trans('backs.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('backs.back.edit', $back->id ) }}" class="btn btn-primary" title="{{ trans('backs.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('backs.delete') }}" onclick="return confirm(&quot;{{ trans('backs.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button> --}}
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>



        @endif

    </div>
@endsection
