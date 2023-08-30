@extends('layouts.appclient')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('importations.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('importations.client.index') }}" class="btn btn-primary" title="{{ trans('importations.show_all') }}">
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

            <form method="POST" action="{{ route('importations.client.store') }}" accept-charset="UTF-8" id="create_importation_form" name="create_importation_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('importationsclient.form', [
                                        'importation' => null,
                                      ])



<br><br><br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('importations.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>








{{--
    <!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
     <div  class="form-horizontal">


        <input type="hidden" name="client_id" id="client_id" value="{{ auth()->guard('clientt')->user()->id }}" >

        <input type="button" class="btn btn-primary" value=" {{ trans('importations.add') }} "  onclick="addRowto()" >


     </div>
    </div>

  </div> --}}
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
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SPECIES[]" id="" value="'+ document.getElementById("ANML_SPECIES").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SEX[]" id="" value="'+ document.getElementById("ANML_SEX").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_NUMBER[]" id="" value="'+ document.getElementById("ANML_NUMBER").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_USE[]" id="" value="'+ document.getElementById("ANML_USE").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANIMAL_BREED[]" id="" value="'+ document.getElementById("ANIMAL_BREED").value+'" readonly></td>';


    newRow=newRow + "</tr>";
    $(table).find('tbody').append(newRow);
    modal.style.display = "none";
  //this adds row in 0 index i.e. first place


}
    </script>
@endsection

