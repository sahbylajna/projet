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
                <h4 class="mt-5 mb-5">{{ trans('importations.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('importations.importation.create') }}" class="btn btn-success" title="{{ trans('importations.create') }}">
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

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('importations.client_id') }}</th>




                            <th>{{ trans('importations.IMP_NAME') }}</th>


                            <th>{{ trans('importations.IMP_TEL') }}</th>


                            <th>{{ trans('importations.accepted') }}</th>
                            <th>{{ trans('importations.reson') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($importations as $importation)
                        <tr>
                            <td>{{ optional($importation->client)->ud }}</td>




                            <td>{{ $importation->IMP_NAME }}</td>


                            <td>{{ $importation->IMP_TEL }}</td>


                            <td>{{ $importation->accepted }}</td>
                            <td>{{ $importation->reson }}</td>

                            <td>

                                <form method="POST" action="{!! route('importations.importation.destroy', $importation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right " style="direction: initial;" role="group">
                                        <a href="{{ route('importations.importation.show', $importation->id ) }}" class="btn btn-info" title="{{ trans('importations.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>


                                        <button type="submit" class="btn btn-danger" title="{{ trans('importations.delete') }}" onclick="return confirm(&quot;{{ trans('importations.confirm_delete') }}&quot;)">
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
            {!! $importations->render() !!}
        </div>

        @endif

    </div>
@endsection
