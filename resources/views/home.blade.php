@extends('layouts.app')

@section('content')
<div class="container">

    @if(Auth::user()->hasRole(['Super-Admin','admin']))


 <div class="row justify-content-center">

        <div class="col-lg-3 col-sm-6">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person_add</i>
                </div>
                <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize"><a href="{{ url('clients') }}">{{ trans('clients.model_plural') }}</a> </p>
                  <h4 class="mb-0">{{count(\App\Models\Client::all())}}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">

            </div>
          </div>

          @if(Auth::user()->hasRole(['Super-Admin']))

        <div class="col-lg-3 col-sm-6">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person_add</i>
                </div>
                <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize"><a href="{{ url('users') }}">مندوب</a></p>
                  <h4 class="mb-0">{{count(\App\Models\User::whereHas(
                    'roles', function($q){
                        $q->where('name', 'delegate');
                    }
                )->get())}}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">

            </div>
          </div>


          <div class="col-lg-3 col-sm-6">
            <div class="card">
              <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person_add</i>
                </div>
                <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize"><a href="{{  url('users') }}">مشرف</a></p>
                  <h4 class="mb-0">{{count(\App\Models\User::whereHas(
                    'roles', function($q){
                        $q->where('name', 'admin');
                    }
                )->get())}}</h4>
                </div>
              </div>
              <hr class="dark horizontal my-0">

            </div>
          </div>
@endif

</div>





<br><br>



<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}">{{ trans('importations.model_plural') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}">{{ trans('importations.after') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>






</div>


<br><br>


<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('importations.model_plural') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted','1')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تم رفض طلب">{{ trans('importations.model_plural') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted','0')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تحت الاجراء">{{ trans('importations.model_plural') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>














</div>


<br><br>




<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('importations.after') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted','1')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تم رفض طلب">{{ trans('importations.after') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted','0')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تحت الاجراء">{{ trans('importations.after') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>



</div>


<br><br>



<div class="row justify-content-center">


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}">{{ trans('exports.model_plural') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}">{{ trans('exports.after') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>







</div>


<br><br>























<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('exports.model_plural') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted','1')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تم رفض طلب">{{ trans('exports.model_plural') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted','0')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تحت الاجراء">{{ trans('exports.model_plural') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>














</div>


<br><br>




<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('exports.after') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted','1')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تم رفض طلب">{{ trans('exports.after') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted','0')->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تحت الاجراء">{{ trans('exports.after') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted',null)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>



</div>


<br><br>



@endif


@if(Auth::user()->hasRole(['delegate']))


<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}">{{ trans('importations.model_plural') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}">{{ trans('importations.after') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>






</div>


<br><br>


<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('importations.model_plural') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted','1')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تم رفض طلب">{{ trans('importations.model_plural') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted','0')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importations') }}?value=تحت الاجراء">{{ trans('importations.model_plural') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL',null)->where('accepted',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>














</div>


<br><br>




<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('importations.after') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted','1')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تم رفض طلب">{{ trans('importations.after') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted','0')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('importationsafter') }}?value=تحت الاجراء">{{ trans('importations.after') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\importation::where('EXP_CER_SERIAL','!=',null)->where('accepted',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>



</div>


<br><br>



<div class="row justify-content-center">


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}">{{ trans('exports.model_plural') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">logout</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}">{{ trans('exports.after') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>







</div>


<br><br>























<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('exports.model_plural') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted','1')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تم رفض طلب">{{ trans('exports.model_plural') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted','0')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exports') }}?value=تحت الاجراء">{{ trans('exports.model_plural') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL',null)->where('accepted',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>














</div>


<br><br>




<div class="row justify-content-center">

    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تم قبول طلبك من قبل المشرف">{{ trans('exports.after') }} {{ trans('importations.accet') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted','1')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>


    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تم رفض طلب">{{ trans('exports.after') }} {{ trans('importations.refus') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted','0')->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>




    <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">login</i>
            </div>
            <div class="text-start pt-1">
                <p class="text-sm mb-0 text-capitalize"><a href="{{ url('exportsafter') }}?value=تحت الاجراء">{{ trans('exports.after') }} {{ trans('importations.wating') }}</a></p>
                <h4 class="mb-0">{{count(\App\Models\export::where('IMP_CER_SERIAL','!=',null)->where('accepted',null)->where('delegate',Auth::user()->id)->get())}}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">

        </div>
    </div>



</div>


<br><br>










@endif


</div>









@endsection

