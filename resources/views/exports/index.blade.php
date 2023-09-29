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
                <h4 class="mt-5 mb-5">{{ trans('exports.model_plural') }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('exports.export.create') }}" class="btn btn-success" title="{{ trans('exports.create') }}">
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
                            <th>{{ trans('exports.client_id') }}</th>


                            <th>{{ trans('exports.COMP_ID') }}</th>
                            <th>{{ trans('exports.EUSER_QID') }}</th>
                            <th>{{ trans('exports.EXP_NAME') }}</th>
                            <th>{{ trans('exports.EXP_TEL') }}</th>


                            <th>{{ trans('exports.IMP_NAME') }}</th>
                            <th>{{ trans('exports.IMP_QID') }}</th>

                            <th>{{ trans('exports.IMP_TEL') }}</th>

                            <th>{{ trans('exports.accepted') }}</th>
                            <th>{{ trans('exports.reson') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($exports as $export)
                        <tr>
                            <td>{{ optional($export->client)->ud }}</td>


                            <td>{{ $export->COMP_ID }}</td>
                            <td>{{ $export->EUSER_QID }}</td>
                            <td>{{ $export->EXP_NAME }}</td>
                            <td>{{ $export->EXP_TEL }}</td>


                            <td>{{ $export->IMP_NAME }}</td>
                            <td>{{ $export->IMP_QID }}</td>

                            <td>{{ $export->IMP_TEL }}</td>

                            <td>{{ $export->accepted }}</td>
                            <td>{{ $export->reson }}</td>

                            <td>



                                    <div class="btn-group btn-group-xs pull-right" role="group" style="direction: initial;">
                                        <a href="{{ route('exports.export.show', $export->id ) }}" class="btn btn-info" title="{{ trans('exports.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>



                                    </div>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $exports->render() !!}
        </div>

        @endif

    </div>
@endsection
