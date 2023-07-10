@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Export' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('exports.export.destroy', $export->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('exports.export.index') }}" class="btn btn-primary" title="{{ trans('exports.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('exports.export.create') }}" class="btn btn-success" title="{{ trans('exports.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('exports.export.edit', $export->id ) }}" class="btn btn-primary" title="{{ trans('exports.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('exports.delete') }}" onclick="return confirm(&quot;{{ trans('exports.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('exports.client_id') }}</dt>
            <dd>{{ optional($export->client)->created_at }}</dd>
            <dt>{{ trans('exports.CER_TYPE') }}</dt>
            <dd>{{ $export->CER_TYPE }}</dd>
            <dt>{{ trans('exports.CER_LANG') }}</dt>
            <dd>{{ $export->CER_LANG }}</dd>
            <dt>{{ trans('exports.COMP_ID') }}</dt>
            <dd>{{ optional($export->cOMP)->id }}</dd>
            <dt>{{ trans('exports.EUSER_QID') }}</dt>
            <dd>{{ $export->EUSER_QID }}</dd>
            <dt>{{ trans('exports.EXP_NAME') }}</dt>
            <dd>{{ $export->EXP_NAME }}</dd>
            <dt>{{ trans('exports.EXP_TEL') }}</dt>
            <dd>{{ $export->EXP_TEL }}</dd>
            <dt>{{ trans('exports.EXP_FAX') }}</dt>
            <dd>{{ $export->EXP_FAX }}</dd>
            <dt>{{ trans('exports.EXP_COUNTRY') }}</dt>
            <dd>{{ $export->EXP_COUNTRY }}</dd>
            <dt>{{ trans('exports.IMP_NAME') }}</dt>
            <dd>{{ $export->IMP_NAME }}</dd>
            <dt>{{ trans('exports.IMP_QID') }}</dt>
            <dd>{{ $export->IMP_QID }}</dd>
            <dt>{{ trans('exports.IMP_FAX') }}</dt>
            <dd>{{ $export->IMP_FAX }}</dd>
            <dt>{{ trans('exports.IMP_TEL') }}</dt>
            <dd>{{ $export->IMP_TEL }}</dd>
            <dt>{{ trans('exports.IMP_COUNTRY') }}</dt>
            <dd>{{ $export->IMP_COUNTRY }}</dd>
            <dt>{{ trans('exports.ORIGIN_COUNTRY') }}</dt>
            <dd>{{ $export->ORIGIN_COUNTRY }}</dd>
            <dt>{{ trans('exports.SHIPPING_PLACE') }}</dt>
            <dd>{{ $export->SHIPPING_PLACE }}</dd>
            <dt>{{ trans('exports.TRANSPORT') }}</dt>
            <dd>{{ $export->TRANSPORT }}</dd>
            <dt>{{ trans('exports.SHIPPING_DATE') }}</dt>
            <dd>{{ $export->SHIPPING_DATE }}</dd>
            <dt>{{ trans('exports.APPLICANT_NAME') }}</dt>
            <dd>{{ $export->APPLICANT_NAME }}</dd>
            <dt>{{ trans('exports.APPLICANT_TEL') }}</dt>
            <dd>{{ $export->APPLICANT_TEL }}</dd>
            <dt>{{ trans('exports.EXP_NATIONALITY') }}</dt>
            <dd>{{ $export->EXP_NATIONALITY }}</dd>
            <dt>{{ trans('exports.EXP_PASSPORT_NUM') }}</dt>
            <dd>{{ $export->EXP_PASSPORT_NUM }}</dd>
            <dt>{{ trans('exports.accepted') }}</dt>
            <dd>{{ $export->accepted }}</dd>
            <dt>{{ trans('exports.reson') }}</dt>
            <dd>{{ $export->reson }}</dd>

        </dl>

    </div>
</div>

@endsection
