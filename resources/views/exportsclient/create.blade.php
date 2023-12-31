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

            <form method="POST" action="{{ route('exports.client.store') }}" enctype="multipart/form-data"  accept-charset="UTF-8" id="create_export_form" name="create_export_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('exportsclient.form', [
                                        'export' => null,
                                      ])
<input type="button" class="btn btn-primary" value=" {{ trans('importations.add') }} "  onclick="addRow()" >
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
    </tbody>
</table>
</div>

<br><br><br><br>

<br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('exports.add') }}">
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


                    <div class="form-group {{ $errors->has('ANML_SPECIES') ? 'has-error' : '' }}">
                        <label for="ANML_SPECIES" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_SPECIES" type="text" id="ANML_SPECIES" minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SPECIES__placeholdera') }}">
                            {!! $errors->first('ANML_SPECIES', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ANML_SEX') ? 'has-error' : '' }}">
                        <label for="ANML_SEX" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_SEX" type="text" id="ANML_SEX"  minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_SEX__placeholdera') }}">
                            {!! $errors->first('ANML_SEX', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ANML_NUMBER') ? 'has-error' : '' }}">
                        <label for="ANML_NUMBER" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_NUMBER" type="number" id="ANML_NUMBER" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_NUMBER__placeholdera') }}">
                            {!! $errors->first('ANML_NUMBER', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ANML_USE') ? 'has-error' : '' }}">
                        <label for="ANML_USE" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_USE" type="text" id="ANML_USE"  minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_USE__placeholdera') }}">
                            {!! $errors->first('ANML_USE', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('ANML_MICROCHIP') ? 'has-error' : '' }}">
                        <label for="ANML_MICROCHIP" class="col-md-2 control-label">{{ trans('a_n_i_m_a_l__i_n_f_os.ANML_MICROCHIP') }}</label>
                        <div class="col-md-10">
                            <input class="form-control" name="ANML_MICROCHIP" type="text" id="ANML_MICROCHIP" minlength="1" placeholdera="{{ trans('a_n_i_m_a_l__i_n_f_os.ANIMAL_BREED__placeholdera') }}">
                            {!! $errors->first('ANIMAL_BREED', '<p class="help-block">:message</p>') !!}
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
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_NUMBER[]" id="" value="'+ document.getElementById("ANML_NUMBER").value+'" readonly></td>';

       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_USE[]" id="" value="'+ document.getElementById("ANML_USE").value+'" readonly></td>';
       newRow=newRow + '<td><input  style="    border: aliceblue;" type="text" name="ANML_MICROCHIP[]" id="" value="'+ document.getElementById("ANML_MICROCHIP").value+'" readonly></td>';



        newRow=newRow + "</tr>";
        $(table).find('tbody').append(newRow);
        modal.style.display = "none";
      //this adds row in 0 index i.e. first place


    }
        </script>
    @endsection



