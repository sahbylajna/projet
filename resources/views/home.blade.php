@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                      <i class="material-icons opacity-10">login</i>
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize">{{ trans('importations.model_plural') }}</p>
                        <h4 class="mb-0">{{count(\App\Models\importation::all())}}</h4>
                    </div>
                  </div>
                  <hr class="dark horizontal my-0">

                </div>
            </div>

            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                      <i class="material-icons opacity-10">cached</i>
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize">{{ trans('backs.model_plural') }}</p>
                        <h4 class="mb-0">{{count(\App\Models\back::all())}}</h4>
                    </div>
                  </div>
                  <hr class="dark horizontal my-0">

                </div>
            </div>


            <div class="col-lg-3 col-sm-6 mb-lg-0 mb-4">
                <div class="card">
                  <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                      <i class="material-icons opacity-10">logout</i>
                    </div>
                    <div class="text-start pt-1">
                        <p class="text-sm mb-0 text-capitalize">{{ trans('exports.model_plural') }}</p>
                        <h4 class="mb-0">{{count(\App\Models\export::all())}}</h4>
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
                      <p class="text-sm mb-0 text-capitalize">{{ trans('clients.model_plural') }}</p>
                      <h4 class="mb-0">{{count(\App\Models\Client::all())}}</h4>
                    </div>
                  </div>
                  <hr class="dark horizontal my-0">

                </div>
              </div>


    </div>
</div>
@endsection
