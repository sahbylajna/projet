@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Back' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('backs.back.destroy', $back->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('backs.back.index') }}" class="btn btn-primary" title="{{ trans('backs.show_all') }}">
                        <span class="fa fa-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('backs.back.create') }}" class="btn btn-success" title="{{ trans('backs.create') }}">
                        <span class="fa fa-plus" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('backs.back.edit', $back->id ) }}" class="btn btn-primary" title="{{ trans('backs.edit') }}">
                        <span class="fa fa-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="{{ trans('backs.delete') }}" onclick="return confirm(&quot;{{ trans('backs.confirm_delete') }}?&quot;)">
                        <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('backs.client_id') }}</dt>
            <dd>{{ optional($back->client)->created_at }}</dd>
            <dt>{{ trans('backs.CER_TYPE') }}</dt>
            <dd>{{ $back->CER_TYPE }}</dd>
            <dt>{{ trans('backs.CER_LANG') }}</dt>
            <dd>{{ $back->CER_LANG }}</dd>
            <dt>{{ trans('backs.COMP_ID') }}</dt>
            <dd>{{ optional($back->cOMP)->id }}</dd>
            <dt>{{ trans('backs.EUSER_QID') }}</dt>
            <dd>{{ $back->EUSER_QID }}</dd>
            <dt>{{ trans('backs.EXP_NAME') }}</dt>
            <dd>{{ $back->EXP_NAME }}</dd>
            <dt>{{ trans('backs.EXP_TEL') }}</dt>
            <dd>{{ $back->EXP_TEL }}</dd>
            <dt>{{ trans('backs.EXP_QID') }}</dt>
            <dd>{{ $back->EXP_QID }}</dd>
            <dt>{{ trans('backs.EXP_FAX') }}</dt>
            <dd>{{ $back->EXP_FAX }}</dd>
            <dt>{{ trans('backs.EXP_COUNTRY') }}</dt>
            <dd>{{ $back->EXP_COUNTRY }}</dd>
            <dt>{{ trans('backs.IMP_NAME') }}</dt>
            <dd>{{ $back->IMP_NAME }}</dd>
            <dt>{{ trans('backs.IMP_ADDRESS') }}</dt>
            <dd>{{ $back->IMP_ADDRESS }}</dd>
            <dt>{{ trans('backs.IMP_FAX') }}</dt>
            <dd>{{ $back->IMP_FAX }}</dd>
            <dt>{{ trans('backs.IMP_TEL') }}</dt>
            <dd>{{ $back->IMP_TEL }}</dd>
            <dt>{{ trans('backs.IMP_POBOX') }}</dt>
            <dd>{{ $back->IMP_POBOX }}</dd>
            <dt>{{ trans('backs.IMP_COUNTRY') }}</dt>
            <dd>{{ $back->IMP_COUNTRY }}</dd>
            <dt>{{ trans('backs.ORIGIN_COUNTRY') }}</dt>
            <dd>{{ $back->ORIGIN_COUNTRY }}</dd>
            <dt>{{ trans('backs.SHIPPING_PLACE') }}</dt>
            <dd>{{ $back->SHIPPING_PLACE }}</dd>
            <dt>{{ trans('backs.ENTERY_PORT') }}</dt>
            <dd>{{ $back->ENTERY_PORT }}</dd>
            <dt>{{ trans('backs.EXPECTED_ARRIVAL_DATE') }}</dt>
            <dd>{{ $back->EXPECTED_ARRIVAL_DATE }}</dd>
            <dt>{{ trans('backs.TRANSPORT') }}</dt>
            <dd>{{ $back->TRANSPORT }}</dd>
            <dt>{{ trans('backs.SHIPPING_DATE') }}</dt>
            <dd>{{ $back->SHIPPING_DATE }}</dd>
            <dt>{{ trans('backs.APPLICANT_NAME') }}</dt>
            <dd>{{ $back->APPLICANT_NAME }}</dd>
            <dt>{{ trans('backs.APPLICANT_TEL') }}</dt>
            <dd>{{ $back->APPLICANT_TEL }}</dd>
            <dt>{{ trans('backs.EXP_NATIONALITY') }}</dt>
            <dd>{{ $back->EXP_NATIONALITY }}</dd>
            <dt>{{ trans('backs.EXP_PASSPORT_NUM') }}</dt>
            <dd>{{ $back->EXP_PASSPORT_NUM }}</dd>
            <dt>{{ trans('backs.accepted') }}</dt>
            <dd>{{ $back->accepted }}</dd>
            <dt>{{ trans('backs.reson') }}</dt>
            <dd>{{ $back->reson }}</dd>

        </dl>

    </div>
</div>

@endsection
