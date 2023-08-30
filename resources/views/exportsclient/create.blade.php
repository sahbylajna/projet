@extends('layouts.appclient')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('exports.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('exports.client.index') }}" class="btn btn-primary" title="{{ trans('exports.show_all') }}">
                    <span class="fa fa-th-list" aria-hidden="true"></span>
                </a>
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

            <form method="POST" action="{{ route('exports.client.store') }}" accept-charset="UTF-8" id="create_export_form" name="create_export_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('exportsclient.form', [
                                        'export' => null,
                                      ])


<br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('exports.add') }}">
                    </div>
                </div>

            </form>

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
             var table = document.getElementById("tableau");
            var span = document.getElementsByClassName("close")[0];

        var modal = document.getElementById("myModal");
    function addRow() {
        modal.style.display = "block";
    }

    span.onclick = function() {
      modal.style.display = "none";
    }

    function addRowto() {

        var newRow = "<tr>"
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SPECIES[]" id="" value="'+ document.getElementById("ANML_SPECIES").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SEX[]" id="" value="'+ document.getElementById("ANML_SEX").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_USE[]" id="" value="'+ document.getElementById("ANML_USE").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_MICROCHIP[]" id="" value="'+ document.getElementById("ANML_MICROCHIP").value+'" readonly></td>';



        newRow=newRow + "</tr>";
        $(table).find('tbody').append(newRow);
        modal.style.display = "none";
      //this adds row in 0 index i.e. first place


    }
        </script>
    @endsection



