{{-- <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main" style="background: #4a00ff7d;">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="{{ asset('assets/img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold text-white">projet </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">



        <li class="nav-item">
          <a class="nav-link " href="{{ route('client.home') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>


        <li class="nav-item">
            <a class="nav-link " href="{{ route('importations.client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('importations.model_plural') }} </span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link " href="{{ route('backs.client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('backs.model_plural') }} </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="{{ route('exports.client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">dashboard</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('exports.model_plural') }} </span>
            </a>
          </li>

      </ul>
    </div>

  </aside> --}}



  <div id="dw-s1" class="bmd-layout-drawer bg-faded">

    <div class="container-fluid side-bar-container">
        <header class="pb-0">
            <a class="navbar-brand">
                <object class="side-logo" data="{{ asset('images/logo.png') }}" type="image/svg+xml">
                </object>
            </a>
        </header>

        <li class="side a-collapse short m-2 pr-1 pl-1 ">
            <a href="{{ route('client.home') }}" class="side-item  {{'client/home' == request()->path() ? 'selected' : ''}} "><i class="fas fa-tachometer-alt mr-1"></i>لوحة القيادة</a>
        </li>
        <li class="side a-collapse short m-2 pr-1 pl-1 ">
            <a href="{{ route('importations.client.index') }}" class="side-item {{'client/importations/create' == request()->path() ? 'selected' : ''}} {{'client/importations' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('importations.model_plural') }}</a>
        </li>
        <li class="side a-collapse short m-2 pr-1 pl-1 ">
            <a href="{{ route('backs.client.index') }}" class="side-item {{'client/backs' == request()->path() ? 'selected' : ''}} {{'client/backs/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('backs.model_plural') }}</a>
        </li>
        <li class="side a-collapse short m-2 pr-1 pl-1 ">
            <a href="{{ route('exports.client.index') }}" class="side-item  {{'client/exports' == request()->path() ? 'selected' : ''}} {{'client/exports/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('exports.model_plural') }}</a>
        </li>









    </div>

</div>
