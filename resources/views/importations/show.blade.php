@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Importation' }} {{ $importation->CER_SERIAL }}</h4>
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
            <div  class="form-group">

                <table id="tableau" class=" table-striped ">
                    <thead>
                        <tr>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.EXPORT_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $importation->animal as $value )
                            <tr>
                                <td> {{ $value->EXPORT_COUNTRY }}</td>
                                <td> {{ $value->ORIGIN_COUNTRY }}</td>
                                <td> {{ $value->TRANSIET_COUNTRY }}</td>
                                <td> {{ $value->ANML_SPECIES }}</td>
                                <td> {{ $value->ANML_SEX }}</td>
                                <td> {{ $value->ANML_NUMBER }}</td>
                                <td> {{ $value->ANML_USE }}</td>
                                <td> {{ $value->ANIMAL_BREED }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <br>


                <dd> <a href="{{ asset($importation->files) }}" target="_blank">مشاهدة المرفقات</a> </dd>

                @if ($importation->accepted == null)
                {{-- <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8"> --}}
                    {{-- <input name="_method" value="DELETE" type="hidden"> --}}
                    {{-- {{ csrf_field() }} --}}
                <a href="{{ route('importation.accept', $importation->id) }}" class="btn btn-primary">{{ trans('clients.accepted') }}</a>


                <a  onclick="addRow()"  class="btn btn-danger">{{ trans('clients.refused') }}</a>



               </div>

                 </form>
            @elseif ($importation->accepted == 1)
            <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
            @elseif ($importation->accepted == 0)
            <p class="btn btn-danger">  {{ trans('importations.reson') }} : {{ $importation->reson }} </p>
            @endif
                <br><br><br>
        </dl>

    </div>
</div>


















<div class="modal w-lg fade show" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog " role="document">
        <div class="modal-content card shade">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('importation.refuse', $importation->id) }}" id="edit_importation_form" name="edit_importation_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}



            <div class="modal-body">


                <div class="form-group {{ $errors->has('commenter') ? 'has-error' : '' }}">
                    <label for="commenter" class="col-md-2 control-label">{{ trans('importations.reson') }}</label>
                    <div class="col-md-10">
                        <input class="form-control" name="commenter" type="text" id="commenter" minlength="1" placeholdera="{{ trans('importations.reson') }}">
                        {!! $errors->first('commenter', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>







            </div>
            <div class="modal-footer">

<button type="submit" class="btn btn-primary">{{ trans('importations.add') }} </button>


            </div>
        </form>
        </div>
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

@section('js')
    <script>
 var modal = document.getElementById("myModal");
function addRow() {
    modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

    </script>
@endsection
