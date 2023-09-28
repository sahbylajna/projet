@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Export' }} {{ $export->CER_SERIAL }}</h4>
        </span>

        <div class="pull-right">



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
        <dl class="dl-horizontal">
            <dt>{{ trans('exports.client_id') }}</dt>
            <dd>{{ optional($export->client)->name }}</dd>
            <dt>{{ trans('exports.CER_TYPE') }}</dt>
            <dd>{{ $export->CER_TYPE }}</dd>
            <dt>{{ trans('exports.CER_LANG') }}</dt>
            <dd>{{ $export->CER_LANG }}</dd>
            <dt>{{ trans('exports.COMP_ID') }}</dt>
            <dd>{{ $export->COMP_ID }}</dd>
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
            <dt>{{ trans('importations.animal') }}</dt>
            <div  class="form-group">

                <table id="tableau" class=" table-striped ">
                    <thead>
                        <tr>

                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</th>
                            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ( $export->animal as $value )
                            <tr>

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
<br><br><br><br>

<dt>مشاهدة المرفقات</dt>
<dd> <a href="{{ asset($export->files) }}" target="_blank">  كشف المطايا</a> </dd>
<dd> <a href="{{ asset($export->Pledge) }}" target="_blank">التعهد</a> </dd>

<br><br><br><br>
                @if ($export->accepted == null)
                {{-- <form method="POST" action="{!! route('clients.client.refused', $client->id) !!}" accept-charset="UTF-8"> --}}
                    {{-- <input name="_method" value="DELETE" type="hidden"> --}}
                    {{-- {{ csrf_field() }} --}}
                <a href="{{ route('exports.accept', $export->id) }}" class="btn btn-primary">{{ trans('clients.accepted') }}</a>


                <a  onclick="addRow()"  class="btn btn-danger">{{ trans('clients.refused') }}</a>


               </div>

                 </form>
            @elseif ($export->accepted == 1)
            <p class="btn btn-info">{{ trans('clients.accepted') }}</p>
            @elseif ($export->accepted == 0)
            <p class="btn btn-danger">  {{ trans('importations.reson') }} : {{ $export->reson }} </p>
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
            <form method="POST" action="{{ route('export.refuse', $export->id) }}" id="edit_importation_form" name="edit_importation_form" accept-charset="UTF-8" class="form-horizontal">
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
