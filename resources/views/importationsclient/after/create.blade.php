@extends('layouts.appclient')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <span class="pull-left">
                <h4 class="mt-5 mb-5">{{ trans('importations.create') }}</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('importations.after.client.index') }}" class="btn btn-primary" title="{{ trans('importations.show_all') }}">
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

            <form method="POST" action="{{ route('importations.client.store') }}" accept-charset="UTF-8" id="create_importation_form" name="create_importation_form"  enctype="multipart/form-data"  class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('EXP_CER_SERIAL') ? 'has-error' : '' }}">
                <label for="EXP_CER_SERIAL" class="col-md-2 control-label">{{ trans('importations.EXP_CER_SERIAL') }}</label>
                <div class="col-md-10">
                    <input class="form-control" name="EXP_CER_SERIAL" type="text" id="EXP_CER_SERIAL" value="" minlength="1" required placeholder="معرفه الخروج">
                    {!! $errors->first('EXP_CER_SERIAL', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div id="toast" class="toast">
                <div  id="toasttext"></div>
              </div>
              <br>
              <br><br>
              <br>
            <div class="btn btn-primary" id="check"  onclick="check()"  > التحقق</div>


            <br>
            <br>


          @include ('importationsclient.form', [
                                        'importation' => null,
                                      ])



<input type="button" class="btn btn-primary" value=" {{ trans('importations.add') }} "  onclick="addRow()" >
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
    </tbody>
</table>
</div>

<br><br><br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('importations.add') }}">
                    </div>
                </div>

            </form>

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
                <div class="modal-body">
                    <div class="form-group {{ $errors->has('EXPORT_COUNTRY') ? 'has-error' : '' }}">
                        <label for="EXPORT_COUNTRY" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.EXPORT_COUNTRY') }}</label>
                        <div class="col-md-10">
                            @php
                            $countries =   App\Models\countries::where('active',1)->get();
                            @endphp
                                    <select name="EXPORT_COUNTRY" id="EXPORT_COUNTRY"  class="form-control">
                                        @foreach ($countries as $countrie)
                                        <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
                                        @endforeach
                                    </select>

                            {!! $errors->first('EXPORT_COUNTRY', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ORIGIN_COUNTRY') ? 'has-error' : '' }}">
                        <label for="ORIGIN_COUNTRY" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</label>
                        <div class="col-md-10">

                                    <select name="ORIGIN_COUNTRYa" id="ORIGIN_COUNTRYa"  class="form-control">
                                        @foreach ($countries as $countrie)
                                        <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
                                        @endforeach
                                    </select>
                            {!! $errors->first('ORIGIN_COUNTRY', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('TRANSIET_COUNTRY') ? 'has-error' : '' }}">
                        <label for="TRANSIET_COUNTRY" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</label>
                        <div class="col-md-10">

                                    <select name="TRANSIET_COUNTRY" id="TRANSIET_COUNTRY"  class="form-control">
                                        @foreach ($countries as $countrie)
                                        <option value="{{ $countrie->name }}">{{ $countrie->name }}</option>
                                        @endforeach
                                    </select>
                            {!! $errors->first('TRANSIET_COUNTRY', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <input class="form-control" name="ANML_SPECIES" type="hidden" id="ANML_SPECIES" value="ابل هجن" minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES__placeholdera') }}">
                    <input class="form-control" name="ANML_SEX" type="hidden" id="ANML_SEX" value="هجين"  minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX__placeholdera') }}">
                    <input class="form-control" name="ANIMAL_BREED" type="hidden" id="ANIMAL_BREED" value="حسب الكشف المرفق" minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED__placeholdera') }}">
                    <input class="form-control" name="ANML_USE" type="hidden" value="مشاركة" id="ANML_USE"  minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE__placeholdera') }}">


                    <div class="form-group {{ $errors->has('ANML_NUMBER') ? 'has-error' : '' }}">
                        <label for="ANML_NUMBER" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_NUMBER" type="number" id="ANML_NUMBER" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER__placeholdera') }}">
                            {!! $errors->first('ANML_NUMBER', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>



                </div>
                <div class="modal-footer">


                    <input type="hidden" name="client_id" id="client_id" value="{{ auth()->guard('clientt')->user()->id }}" >

        <input type="button" class="btn outlined f-main" value=" {{ trans('importations.add') }} "  onclick="addRowto()" >
                </div>
            </div>
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


.toast {
    display: none;
    position: fixed;
    opacity: 1;
    background-color: #333;
    color: #fff;
    padding: 15px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

/* Style for the show button */
#showToast {
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
}

#showToast:hover {
    background-color: #0056b3;
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
   newRow=newRow + '<td><input style="    border: aliceblue;" type="text" name="EXPORT_COUNTRY" id="" value="'+ document.getElementById("EXPORT_COUNTRY").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ORIGIN_COUNTRYa" id="" value="'+ document.getElementById("ORIGIN_COUNTRYa").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="TRANSIET_COUNTRY" id="" value="'+ document.getElementById("TRANSIET_COUNTRY").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SPECIES" id="" value="'+ document.getElementById("ANML_SPECIES").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_SEX" id="" value="'+ document.getElementById("ANML_SEX").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_NUMBER" id="" value="'+ document.getElementById("ANML_NUMBER").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_USE" id="" value="'+ document.getElementById("ANML_USE").value+'" readonly></td>';
   newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANIMAL_BREED" id="" value="'+ document.getElementById("ANIMAL_BREED").value+'" readonly></td>';


    newRow=newRow + "</tr>";
    $(table).find('tbody').append(newRow);
    modal.style.display = "none";
  //this adds row in 0 index i.e. first place


}

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
function check() {
    var EXP_CER_SERIAL = document.getElementById("EXP_CER_SERIAL").value;
console.log(EXP_CER_SERIAL);
var toast = document.getElementById("toast");
var toasttext = document.getElementById("toasttext");
$.ajax({
    type: 'POST',
    url: '{{ asset("api/getcheck") }}',
    dataType: 'json',
    data: {'CER_SERIAL': EXP_CER_SERIAL},
    success: function(resp){
        toasttext.innerHTML = '';

        var textNode = document.createTextNode(resp.APPLICATION_STATUS);

// Append the text node to the div
toasttext.appendChild(textNode);
        toast.style.display = "block";
        console.log(textNode);
// Hide the toast after a few seconds (e.g., 3 seconds)
setTimeout(function() {
    toast.style.display = "none";
}, 3000);

    },
    error: function(xhr, status, error){
        console.error(xhr.responseText);
        console.log(EXP_CER_SERIAL);
    }
});


}

    </script>
@endsection

