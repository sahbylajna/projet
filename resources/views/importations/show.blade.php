@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Importation' }}</h4>
        </span>

        <div class="pull-right">


                <div class="btn-group btn-group-sm" role="group">





                </div>


        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('importations.client_id') }}</dt>
            <dd>{{ optional($importation->client)->ud }}</dd>
            <dt>{{ trans('importations.CER_TYPE') }}</dt>
            <dd>{{ $importation->CER_TYPE }}</dd>
            <dt>{{ trans('importations.CER_LANG') }}</dt>
            <dd>{{ $importation->CER_LANG }}</dd>
            <dt>{{ trans('importations.COMP_ID') }}</dt>
            <dd>{{ $importation->COMP_ID}}</dd>
            <dt>{{ trans('importations.EUSER_QID') }}</dt>
            <dd>{{ $importation->EUSER_QID }}</dd>
            <dt>{{ trans('importations.EXP_NAME') }}</dt>
            <dd>{{ $importation->EXP_NAME }}</dd>
            <dt>{{ trans('importations.EXP_TEL') }}</dt>
            <dd>{{ $importation->EXP_TEL }}</dd>
            <dt>{{ trans('importations.EXP_QID') }}</dt>
            <dd>{{ $importation->EXP_QID }}</dd>
            <dt>{{ trans('importations.EXP_FAX') }}</dt>
            <dd>{{ $importation->EXP_FAX }}</dd>
            <dt>{{ trans('importations.EXP_COUNTRY') }}</dt>
            <dd>{{ $importation->EXP_COUNTRY }}</dd>
            <dt>{{ trans('importations.IMP_NAME') }}</dt>
            <dd>{{ $importation->IMP_NAME }}</dd>
            <dt>{{ trans('importations.IMP_ADDRESS') }}</dt>
            <dd>{{ $importation->IMP_ADDRESS }}</dd>
            <dt>{{ trans('importations.IMP_FAX') }}</dt>
            <dd>{{ $importation->IMP_FAX }}</dd>
            <dt>{{ trans('importations.IMP_TEL') }}</dt>
            <dd>{{ $importation->IMP_TEL }}</dd>
            <dt>{{ trans('importations.IMP_POBOX') }}</dt>
            <dd>{{ $importation->IMP_POBOX }}</dd>
            <dt>{{ trans('importations.IMP_COUNTRY') }}</dt>
            <dd>{{ $importation->IMP_COUNTRY }}</dd>
            <dt>{{ trans('importations.ORIGIN_COUNTRY') }}</dt>
            <dd>{{ $importation->ORIGIN_COUNTRY }}</dd>
            <dt>{{ trans('importations.SHIPPING_PLACE') }}</dt>
            <dd>{{ $importation->SHIPPING_PLACE }}</dd>
            <dt>{{ trans('importations.ENTERY_PORT') }}</dt>
            <dd>{{ $importation->ENTERY_PORT }}</dd>
            <dt>{{ trans('importations.EXPECTED_ARRIVAL_DATE') }}</dt>
            <dd>{{ $importation->EXPECTED_ARRIVAL_DATE }}</dd>
            <dt>{{ trans('importations.TRANSPORT') }}</dt>
            <dd>{{ $importation->TRANSPORT }}</dd>
            <dt>{{ trans('importations.SHIPPING_DATE') }}</dt>
            <dd>{{ $importation->SHIPPING_DATE }}</dd>
            <dt>{{ trans('importations.APPLICANT_NAME') }}</dt>
            <dd>{{ $importation->APPLICANT_NAME }}</dd>
            <dt>{{ trans('importations.APPLICANT_TEL') }}</dt>
            <dd>{{ $importation->APPLICANT_TEL }}</dd>
            <dt>{{ trans('importations.EXP_NATIONALITY') }}</dt>
            <dd>{{ $importation->EXP_NATIONALITY }}</dd>
            <dt>{{ trans('importations.EXP_PASSPORT_NUM') }}</dt>
            <dd>{{ $importation->EXP_PASSPORT_NUM }}</dd>
            <dt>{{ trans('importations.animal') }}</dt>
            <dd>{{ $importation->animal }}</dd>



                @if ($importation->accepted == null)
                {{-- <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8"> --}}
                    {{-- <input name="_method" value="DELETE" type="hidden"> --}}
                    {{-- {{ csrf_field() }} --}}
                <a href="{{ route('importation.accept', $importation->id) }}" class="btn btn-primary">{{ trans('clients.accepted') }}</a>




               </div>

                 </form>
            @elseif ($importation->accepted == 1)
            <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
            @elseif ($importation->accepted == 0)
            <p class="btn btn-danger">  {{ trans('clients.refused') }} {{ $importation->reson }} </p>
            @endif
                <br><br><br>
        </dl>

    </div>
</div>

@endsection
@section('css')
<style>
    table{
  border-collapse: collapse;
}

th, td{
  border: 1px solid black;
  padding: 10px;
}
</style>

@endsection

