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
                <h4 class="mt-5 mb-5">{{ trans('terms.model_plural') }}</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('terms.term.create') }}" class="btn btn-success" title="{{ trans('terms.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        @if(count($terms) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('terms.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('terms.term_ar') }}</th>
                            <th>{{ trans('terms.term_en') }}</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($terms as $term)
                        <tr>
                            <td>{{ $term->term_ar }}</td>
                            <td>{{ $term->term_en }}</td>

                            <td>

                                <form method="POST" action="{!! route('terms.term.destroy', $term->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('terms.term.show', $term->id ) }}" class="btn btn-info" title="{{ trans('terms.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('terms.term.edit', $term->id ) }}" class="btn btn-primary" title="{{ trans('terms.edit') }}">
                                            <span class="fa fa-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="{{ trans('terms.delete') }}" onclick="return confirm(&quot;{{ trans('terms.confirm_delete') }}&quot;)">
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
            {!! $terms->render() !!}
        </div>

        @endif

    </div>
@endsection
