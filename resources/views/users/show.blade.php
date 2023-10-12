@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Users' }}</h4>
        </span>



    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>{{ trans('users.first_name') }}</dt>
            <dd>{{ $users->first_name }}</dd>
            <dt>{{ trans('users.last_name') }}</dt>
            <dd>{{ $users->last_name }}</dd>
            <dt>{{ trans('users.ud') }}</dt>
            <dd>{{ $users->ud }}</dd>
            <dt>{{ trans('users.email') }}</dt>
            <dd>{{ $users->email }}</dd>
            {{-- <dt>{{ trans('users.email_verified_at') }}</dt>
            <dd>{{ $users->email_verified_at }}</dd> --}}
            {{-- <dt>{{ trans('users.password') }}</dt>
            <dd>{{ $users->password }}</dd> --}}




        </dl>

    </div>
</div>
@if ($users->hasRole(['delegate']))



<div class="panel panel-default">
    {{-- <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Users' }}</h4>
        </span>



    </div> --}}

    <div class="panel-body">
        <div class="p-4 bg-light">
            <div class="row">
                <div class="col-md-6">

                    <div class="input-group input-group-outline is-valid my-3">
                        <label class="form-label">تاريخ البدء</label>
                        <input type="date" id="start-date" class="form-control">
                    </div>
                    <div class="input-group input-group-outline is-valid my-3">
                        <label class="form-label">تاريخ الانتهاء</label>
                        <input type="date" id="end-date" class="form-control">
                    </div>

                </div></div>
        </div>
<div id="chart-container"></div>



    </div>
</div>
@endif



@if ($users->hasRole(['admin']))



<div class="panel panel-default">
    {{-- <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Users' }}</h4>
        </span>



    </div> --}}

    <div class="panel-body">
        <div class="table-responsive table-responsive p-0">

                    <table class="table align-items-center mb-0" style="   "  id="table">
                        <thead>
                            <tr>
                                <th>{{ trans('importations.client_id') }}</th>
                                <th>{{ trans('importations.IMP_NAME') }}</th>

                                <th>نوع الطالب</th>
                                <th>{{ trans('importations.accepted') }}</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                              $acceptation_impo =  \App\Models\acceptation_demande::where('User_id',$users->id)->where('type','importation')->with('importation')->get();
                              $acceptation_expo =  \App\Models\acceptation_demande::where('User_id',$users->id)->where('type','export')->with('export')->get();

                            @endphp
                        @foreach($acceptation_impo as $accep)
                            <tr>
                                <td>{{ optional($accep->importation->client)->ud }}</td>




                                <td>{{ $accep->importation->IMP_NAME }}</td>
                                <td>
                                    @if ($accep->importation->CER_SERIAL == null)
                                    {{ trans('importations.model_plural') }}
                                    @else
                                    {{ trans('importations.after') }}
                                    @endif


                                   </td>

                                <td>
                                    @if ($accep->importation->accepted == '1' )

                                <p class="btn btn-info">{{ trans('importations.acceptedfirst') }}</p>
                                @elseif ( $accep->importation->accepted == '3')
                                <p class="btn btn-info">{{ trans('importations.acceptedsacend') }}</p>
                                @elseif ($accep->importation->accepted == '0')
                                <p class="btn btn-danger">  {{ trans('importations.refused') }}    {{ $accep->commenter }}  </p>
                                @endif
                                 </td>
                                <td>


                                    @if ($accep->importation->CER_SERIAL == null)
                                    <a href="{{ route('importations.importation.show', $accep->importation->id ) }}" class="btn btn-info" title="{{ trans('importations.show') }}">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>
                                @else
                                <a href="{{ route('importationsafter.importation.show', $accep->importation->id ) }}" class="btn btn-info" title="{{ trans('importations.show') }}">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>
                                @endif

                            </td>

                            </tr>
                        @endforeach

                        @foreach($acceptation_expo as $accep)
                        <tr>
                            <td>{{ optional($accep->export->client)->ud }}</td>




                            <td>{{ $accep->export->IMP_NAME }}</td>
                            <td>
                                @if ($accep->export->IMP_CER_SERIAL == null)
                                {{ trans('exports.model_plural') }}
                                @else
                                {{ trans('exports.after') }}
                                @endif


                               </td>

                            <td>
                                @if ($accep->export->accepted == '1' )

                                <p class="btn btn-info">{{ trans('importations.acceptedfirst') }}</p>
                                @elseif ( $accep->export->accepted == '3')
                                <p class="btn btn-info">{{ trans('importations.acceptedsacend') }}</p>
                                @elseif ($accep->export->accepted == '0')
                                <p class="btn btn-danger">  {{ trans('importations.refused') }} {{ $accep->commenter }}  </p>
                                @endif



                             </td>

                            <td>

                                @if ($accep->export->IMP_CER_SERIAL == null)
                                <a href="{{ route('exports.export.show', $accep->export->id ) }}" class="btn btn-info" title="{{ trans('exports.show') }}">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>

                                @else
                                <a href="{{ route('exports.after.export.show', $accep->export->id ) }}" class="btn btn-info" title="{{ trans('exports.show') }}">
                                    <span class="fa fa-eye" aria-hidden="true"></span>
                                </a>

                                @endif


                            </td>

                        </tr>
                    @endforeach
                        </tbody>
                    </table>






    </div>
</div>
@endif



@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@endsection
@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script>

@php
$impos=DB::table('importations')->where('EXP_CER_SERIAL',null)->where('delegate',$users->id)
             ->select( DB::raw('count(id) as `data`'),
      DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as new_date")
    )
    ->groupBy('new_date')->orderBy('new_date')->get();
    // return $count;

    $imposafter=DB::table('importations')
    ->where('EXP_CER_SERIAL', '!=', null)
    ->where('delegate', $users->id) // Use 'where' here to filter by 'delegate'
    ->select(
        DB::raw('count(id) as `data`'),
        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as new_date")
    )
    ->groupBy('new_date')
    ->orderBy('new_date')
    ->get();


    $export=DB::table('exports')
    ->where('IMP_CER_SERIAL',  null)
    ->where('delegate', $users->id) // Use 'where' here to filter by 'delegate'
    ->select(
        DB::raw('count(id) as `data`'),
        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as new_date")
    )
    ->groupBy('new_date')
    ->orderBy('new_date')
    ->get();



    $exportafter=DB::table('exports')
    ->where('IMP_CER_SERIAL', '!=', null)
    ->where('delegate', $users->id) // Use 'where' here to filter by 'delegate'
    ->select(
        DB::raw('count(id) as `data`'),
        DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d') as new_date")
    )
    ->groupBy('new_date')
    ->orderBy('new_date')
    ->get();

@endphp
const impos = [
@foreach ($impos as $impo)
{ date:'<?php echo $impo->new_date ?>', value:<?php echo $impo->data ?> },
@endforeach

  // Add more impos here
];

const imposafter = [
@foreach ($imposafter as $impoa)
{ date:'<?php echo $impoa->new_date ?>', value:<?php echo $impoa->data ?> },
@endforeach

  // Add more impos here
];



const exports = [
@foreach ($export as $impo)
{ date:'<?php echo $impo->new_date ?>', value:<?php echo $impo->data ?> },
@endforeach

  // Add more impos here
];

const exportafter = [
@foreach ($exportafter as $impoa)
{ date:'<?php echo $impoa->new_date ?>', value:<?php echo $impoa->data ?> },
@endforeach

  // Add more impos here
];



console.log(exports);
console.log(exportafter);
const chart = Highcharts.chart('chart-container', {
  // Highcharts chart configuration options
     chart: {
        type: "column",
    },
  title: {
    text: '',
  },
  xAxis: {
    type: 'datetime',
    tickInterval: 24 * 3600 * 1000, // 1 day in milliseconds
  dateTimeLabelFormats: {
    day: '%Y-%m-%d', // Year-Month-Day format
  },
  },
  series: [
    {
      name: "{{ trans('importations.model_plural') }}",
      data: impos.map((item) => [new Date(item.date).getTime(), item.value]),
    },
    {
      name: "{{ trans('importations.after') }}",
      data: imposafter.map((item1) => [new Date(item1.date).getTime(), item1.value]),
    },


    {
      name: "{{ trans('exports.model_plural') }}",
      data: exports.map((item) => [new Date(item.date).getTime(), item.value]),
    },
    {
      name: "{{ trans('exports.after') }}",
      data: exportafter.map((item1) => [new Date(item1.date).getTime(), item1.value]),
    },

  ],
});




    $(document).ready(function() {
      const startDateInput = document.getElementById('start-date');
const endDateInput = document.getElementById('end-date');

// Define your default date range (e.g., one week ago to today)
const defaultStartDate = new Date();
defaultStartDate.setDate(defaultStartDate.getDate() - 20); // One week ago
const defaultEndDate = new Date();
defaultEndDate.setDate(defaultEndDate.getDate() ); // One week ago

// Set the default date values in the input fields
startDateInput.valueAsDate = defaultStartDate;
endDateInput.valueAsDate = defaultEndDate;

// Listen for changes in the date range input fields
startDateInput.addEventListener('change', updateChart);
endDateInput.addEventListener('change', updateChart);

// Initialize the chart with the default date range
updateChart();

function updateChart() {
  const startDate = new Date(startDateInput.value).getTime();
  const endDate = new Date(endDateInput.value).getTime();

  const filteredData = impos.filter((item) => {
    const date = new Date(item.date).getTime();
    return date >= startDate && date <= endDate;
  });

  const filteredData2 = imposafter.filter((item1) => {
    const date = new Date(item1.date).getTime();
    return date >= startDate && date <= endDate;
  });


  const filteredData3 = exports.filter((item) => {
    const date = new Date(item.date).getTime();
    return date >= startDate && date <= endDate;
  });

  const filteredData4 = exportafter.filter((item1) => {
    const date = new Date(item1.date).getTime();
    return date >= startDate && date <= endDate;
  });


  chart.series[0].setData(
    filteredData.map((item) => [new Date(item.date).getTime(), item.value]),
    true
  );
  chart.series[1].setData(
    filteredData2.map((item) => [new Date(item.date).getTime(), item.value]),
    true
  );


  chart.series[2].setData(
    filteredData3.map((item) => [new Date(item.date).getTime(), item.value]),
    true
  );
  chart.series[3].setData(
    filteredData4.map((item) => [new Date(item.date).getTime(), item.value]),
    true
  );

}

});



  </script>
















<script>

// Highcharts.chart("container", {
//     chart: {
//         type: "column",
//     },
//     title: {
//         text: "Sent/Received Comparison",
//     },
//     xAxis: {
//         title: {
//             text: "Day",
//         },
//         categories: [labels],
//     },
//     yAxis: {
//         min: 0,
//         title: {
//             text: "",
//         },
//         stackLabels: {
//             enabled: false,
//             style: {
//                 fontWeight: "bold",
//                 color:
//                     // theme
//                     (Highcharts.defaultOptions.title.style && Highcharts.defaultOptions.title.style.color) ||
//                     "gray",
//             },
//         },
//     },
//     legend: {
//         align: "center",
//         verticalAlign: "bottom",
//         x: 0,
//         y: 0,
//     },
//     tooltip: {
//         headerFormat: "<b>{point.x}</b><br/>",
//         pointFormat: "{series.name}: {point.y}",
//     },
//     plotOptions: {
//         column: {
//             stacking: "normal",
//             dataGrouping: {
//                 forced: true,
//                 units: [['day', [1]]]
//             }
//         },
//     },
//     series: chartdata.multistackedbarchart,
//     credits: {
//         enabled: false,
//     },
// });
// Highcharts.setOptions({ lang: { noData: "No Data Available" } });
</script>
@endsection
