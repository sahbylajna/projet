@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ trans('backs.model_plural') }}</h4>
        </span>

        <div class="pull-right">



        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('backs.client_id') }}</dt>
            <dd>{{ optional($back->client)->ud }}</dd>
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
            <dt>{{ trans('importations.animal') }}</dt>
            <div  class="form-group">

                <table id="tableau" class=" table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.EXPORT_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $back->animal as $value )
                            <tr>
                                <td> {{ $value->EXPORT_COUNTRY }}</td>
                                <td> {{ $value->ORIGIN_COUNTRY }}</td>
                                <td> {{ $value->TRANSIET_COUNTRY }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <br>


                @if ($back->accepted == null)
                {{-- <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8"> --}}
                    {{-- <input name="_method" value="DELETE" type="hidden"> --}}
                    {{-- {{ csrf_field() }} --}}
                <a href="{{ route('back.accept', $back->id) }}" class="btn btn-primary">{{ trans('clients.accepted') }}</a>




               </div>

                 </form>
            @elseif ($back->accepted == 1)
            <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
            @elseif ($back->accepted == 0)
            <p class="btn btn-danger">  {{ trans('clients.refused') }} {{ $back->reson }} </p>
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

