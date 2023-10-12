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
                <h4 class="mt-5 mb-5">{{ trans('exports.model_plural') }}</h4>
            </div>
            @can('delegate')
            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('exports.export.create') }}" class="btn btn-success" title="{{ trans('exports.create') }}">
                    <span class="fa fa-plus" aria-hidden="true"></span>
                </a>
            </div>
            @endcan

        </div>

        @if(count($exports) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('exports.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
                <div style="direction:rtl">     <p id="selectTriggerFilter"><label><b>Filter:</b></label><br></p></div>

                <table class="table align-items-center mb-0" style="   "  id="table23">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ trans('exports.client_id') }}</th>


                            <th>{{ trans('exports.COMP_ID') }}</th>
                            <th>{{ trans('exports.EUSER_QID') }}</th>
                            <th>{{ trans('exports.EXP_NAME') }}</th>
                            <th>{{ trans('exports.EXP_TEL') }}</th>


                            <th>{{ trans('exports.IMP_NAME') }}</th>
                            <th>{{ trans('exports.IMP_QID') }}</th>

                            <th>{{ trans('exports.IMP_TEL') }}</th>

                            <th>{{ trans('exports.accepted') }}</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($exports as $export)
                        <tr>
                            <td> {{ $export->CER_SERIAL }}</td>
                            <td>{{ optional($export->client)->ud }}</td>


                            <td>{{ $export->COMP_ID }}</td>
                            <td>{{ $export->EUSER_QID }}</td>
                            <td>{{ $export->EXP_NAME }}</td>
                            <td>{{ $export->EXP_TEL }}</td>


                            <td>{{ $export->IMP_NAME }}</td>
                            <td>{{ $export->IMP_QID }}</td>

                            <td>{{ $export->IMP_TEL }}</td>

                         
                                
                              
                            @if ($export->accepted == '1' )
                            <td>
                            {{ trans('importations.acceptedfirst') }}</td>
                            @elseif ( $export->accepted == '3')
                            <td>
                                {{ trans('importations.acceptedsacend') }}</td>
                            @elseif ($export->accepted == '0')
                            <td >
                                {{ trans('importations.refused') }}  </td>
                            @elseif ($export->accepted == null )
                            
                            <td>تحت الاجراء</td>
                            @else
                            <td> </td>
                            @endif

                          

                            <td>



                                    <div class="btn-group btn-group-xs pull-right" role="group" style="direction: initial;">
                                        <a href="{{ route('exports.export.show', $export->id ) }}" class="btn btn-info" title="{{ trans('exports.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>



                                    </div>


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        @endif

    </div>
@endsection

@section('js')
<script>
  $(document).ready( function () {

$('#table23').DataTable({

order: [ [0, 'desc'] ],

            "language": {
                "sProcessing": "جارٍ التحميل...",
                "sLengthMenu": "أظهر _MENU_ مدخلات",
                "sZeroRecords": "لم يعثر على أية سجلات",
                "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                "sInfoPostFix": "",
                "sSearch": "ابحث:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "الأول",
                    "sPrevious": "السابق",
                    "sNext": "التالي",
                    "sLast": "الأخير"
                }
                },
                initComplete: function() {
  var column = this.api().column(9);

  var select = $('<select id="mySelect" class="filter"><option value=""></option></select>')
    .appendTo('#selectTriggerFilter')
    .on('change', function() {
      var val = $(this).val();
      column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
    });

  column.data().unique().sort().each(function(d, j) {
    select.append('<option value="' + d + '">' + d + '</option>');
  });
  
  const $select = document.querySelector('#mySelect');
  @if($request->value != null)
  text ='{{ $request->value}}'
 

  const $options = Array.from($select.options);
  const optionToSelect = $options.find(item => item.text ===text);
  optionToSelect.selected = true;
  column.search(text ? '^' + text + '$' : text, true, false).draw();
  console.log(optionToSelect);
  @else
  text = "تحت الاجراء"
  @endif
}

});
});


</script>

@endsection