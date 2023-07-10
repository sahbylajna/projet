@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Export' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('exports.export.index') }}" class="btn btn-primary" title="{{ trans('exports.show_all') }}">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>

                <a href="{{ route('exports.export.create') }}" class="btn btn-success" title="{{ trans('exports.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('exports.export.update', $export->id) }}" id="edit_export_form" name="edit_export_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('exports.form', [
                                        'export' => $export,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('exports.update') }}">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
