@extends('layouts.appclient')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('backs.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('backs.client.index') }}" class="btn btn-primary" title="{{ trans('backs.show_all') }}">
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

            <form method="POST" action="{{ route('backs.client.store') }}" accept-charset="UTF-8" id="create_back_form" name="create_back_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('backsclient.form', [
                                        'back' => null,
                                      ])






                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('backs.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>


    <!-- The Modal -->



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
       newRow=newRow + '<td><input style="    border: aliceblue;" type="text" name="EXPORT_COUNTRY[]" id="" value="'+ document.getElementById("EXPORT_COUNTRY").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ORIGIN_COUNTRYa[]" id="" value="'+ document.getElementById("ORIGIN_COUNTRYa").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="TRANSIET_COUNTRY[]" id="" value="'+ document.getElementById("TRANSIET_COUNTRY").value+'" readonly></td>';

        newRow=newRow + "</tr>";
        $(table).find('tbody').append(newRow);
        modal.style.display = "none";
      //this adds row in 0 index i.e. first place


    }
        </script>
    @endsection


