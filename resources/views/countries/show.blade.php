@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($countries->name) ? $countries->name : 'Countries' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('countries.countries.destroy', $countries->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('countries.countries.index') }}" class="btn btn-primary" title="{{ trans('countries.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('countries.countries.create') }}" class="btn btn-success" title="{{ trans('countries.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('countries.countries.edit', $countries->id ) }}" class="btn btn-primary" title="{{ trans('countries.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('countries.delete') }}" onclick="return confirm(&quot;{{ trans('countries.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('countries.iso') }}</dt>
            <dd>{{ $countries->iso }}</dd>
            <dt>{{ trans('countries.name') }}</dt>
            <dd>{{ $countries->name }}</dd>
            <dt>{{ trans('countries.iso3') }}</dt>
            <dd>{{ $countries->iso3 }}</dd>
            <dt>{{ trans('countries.numcode') }}</dt>
            <dd>{{ $countries->numcode }}</dd>
            <dt>{{ trans('countries.phonecode') }}</dt>
            <dd>{{ $countries->phonecode }}</dd>
            <dt>{{ trans('countries.active') }}</dt>
            <dd>{{ $countries->active }}</dd>

        </dl>

    </div>
</div>

@endsection
