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



<input type="button" class="btn btn-primary" value=" {{ trans('importations.add') }} "  onclick="addRow()" >
<div  class="form-group">

<table id="tableau" class=" table-striped ">
    <thead>
        <tr>
            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.EXPORT_COUNTRY') }}</th>
            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.ORIGIN_COUNTRY') }}</th>
            <th>{{ trans('a_n_i_m_a_l__i_n_f_os.TRANSIET_COUNTRY') }}</th>


        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</div>
<br><br><br><br>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="{{ trans('backs.add') }}">
                    </div>
                </div>

            </form>

        </div>
    </div>


    <!-- The Modal -->

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


