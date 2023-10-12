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
                <h4 class="mt-5 mb-5">{{ trans('importations.model_plural') }}</h4>
            </div>
@can('delegate')
<div class="btn-group btn-group-sm pull-right" role="group">
    <a href="{{ route('importations.importation.create') }}" class="btn btn-success" title="{{ trans('importations.create') }}">
        <span class="fa fa-plus" aria-hidden="true"></span>
    </a>
</div>

@endcan


        </div>

        @if(count($importations) == 0)
            <div class="panel-body text-center">
                <h4>{{ trans('importations.none_available') }}</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">
           <div style="direction:rtl">     <p id="selectTriggerFilter"><label><b>Filter:</b></label><br></p></div>

                <table class="table align-items-center mb-0" style="   "  id="table23">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="    visibility: hidden;"></th>
                            <th>{{ trans('importations.client_id') }}</th>




                            <th>{{ trans('importations.IMP_NAME') }}</th>


                            <th>{{ trans('importations.IMP_TEL') }}</th>


                            <th>{{ trans('importations.accepted') }}</th>


                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($importations as $importation)
                        <tr>
                            <td> {{ $importation->CER_SERIAL }}</td>
                            <td style="    visibility: hidden;">{{ $importation->id }}</td>
                            <td>{{ optional($importation->client)->ud }}</td>




                            <td>{{ $importation->IMP_NAME }}</td>


                            <td>{{ $importation->IMP_TEL }}</td>

                        

                                @if ($importation->accepted == '1' )
                                <td>
                                {{ trans('importations.acceptedfirst') }}</td>
                                @elseif ( $importation->accepted == '3')
                                <td>
                                    {{ trans('importations.acceptedsacend') }}</td>
                                @elseif ($importation->accepted == '0')
                                <td >
                                    {{ trans('importations.refused') }}  </td>
                                @elseif ($importation->accepted == null )
                                
                                <td>تحت الاجراء</td>
                                @else
                            <td> </td>
                                @endif
                          

                            <td>

                                <form method="POST" action="{!! route('importations.importation.destroy', $importation->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right " style="direction: initial;" role="group">
                                        <a href="{{ route('importations.importation.show', $importation->id ) }}" class="btn btn-info" title="{{ trans('importations.show') }}">
                                            <span class="fa fa-eye" aria-hidden="true"></span>
                                        </a>


                                        <button type="submit" class="btn btn-danger" title="{{ trans('importations.delete') }}" onclick="return confirm(&quot;{{ trans('importations.confirm_delete') }}&quot;)">
                                            <span class="fa fa-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">

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
  var column = this.api().column(5);

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
  @else
  text = '';
  @endif
}

});
});


</script>

@endsection