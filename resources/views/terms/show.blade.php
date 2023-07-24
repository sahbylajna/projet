@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Term' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('terms.term.destroy', $term->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('terms.term.index') }}" class="btn btn-primary" title="{{ trans('terms.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('terms.term.create') }}" class="btn btn-success" title="{{ trans('terms.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('terms.term.edit', $term->id ) }}" class="btn btn-primary" title="{{ trans('terms.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('terms.delete') }}" onclick="return confirm(&quot;{{ trans('terms.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('terms.term_ar') }}</dt>
            <dd>{{ $term->term_ar }}</dd>
            <dt>{{ trans('terms.term_en') }}</dt>
            <dd>{{ $term->term_en }}</dd>

        </dl>

    </div>
</div>

@endsection
