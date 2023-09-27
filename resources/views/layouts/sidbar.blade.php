<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-end me-3 rotate-caret  bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute start-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{ url('home') }}">
        <img src="{{ asset('images/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="me-1 font-weight-bold text-white">P S </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse px-0 w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">



        <li class="nav-item">
          <a class="nav-link  {{'home' == request()->path() ? 'active' : ''}} " href="{{ route('home') }}">
            <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
              <i class="material-icons-round opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text me-1">لوحة القيادة</span>
          </a>
        </li>
        @if(Auth::user()->hasRole('Super-Admin'))


        <li class="nav-item">
            <a class="nav-link {{'users' == request()->path() ? 'active' : ''}}{{'users/create' == request()->path() ? 'active' : ''}} " href="{{ route('users.users.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">manage_accounts</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('users.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{'api_users' == request()->path() ? 'active' : ''}}{{'api_users/create' == request()->path() ? 'active' : ''}} " href="{{ route('api_users.api_user.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <span class="material-icons">
                    vpn_key
                    </span>
              </div>
              <span class="nav-link-text me-1">{{ trans('api_users.model_plural') }}</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{'settings' == request()->path() ? 'active' : ''}}{{'settings/create' == request()->path() ? 'active' : ''}} " href="{{ route('settings.setting.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <span class="material-icons">settings</span>
              </div>
              <span class="nav-link-text me-1">{{ trans('settings.model_plural') }}</span>
            </a>
          </li>




          <li class="nav-item">
            <a class="nav-link {{'countries' == request()->path() ? 'active' : ''}}{{'countries/create' == request()->path() ? 'active' : ''}}" href="{{ route('countries.countries.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">flag</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('countries.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{'sms' == request()->path() ? 'active' : ''}}{{'sms/create' == request()->path() ? 'active' : ''}}" href="{{ route('sms') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <span class="material-icons">mail</span>
              </div>
              <span class="nav-link-text me-1">SMS</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{'acceptation_clients' == request()->path() ? 'active' : ''}}{{'acceptation_clients/create' == request()->path() ? 'active' : ''}}" href="{{ route('acceptation_clients.acceptation_client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">history</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('login.history') }}</span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{'terms' == request()->path() ? 'active' : ''}}{{'terms/create' == request()->path() ? 'active' : ''}}" href="{{ route('terms.term.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <span class="material-icons">
                    gavel
                    </span>
              </div>
              <span class="nav-link-text me-1">{{ trans('terms.model_plural') }}</span>
            </a>
          </li>


          @endif

          <li class="nav-item">
            <a class="nav-link {{'clients' == request()->path() ? 'active' : ''}}{{'clients/create' == request()->path() ? 'active' : ''}}" href="{{ route('clients.client.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons-round opacity-10">group</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('clients.model_plural') }}</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{'importationsafter' == request()->path() ? 'active' : ''}}{{'importationsafter/create' == request()->path() ? 'active' : ''}}" href="{{ route('importationsafter.importation.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">login</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('importations.after') }} </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{'importations' == request()->path() ? 'active' : ''}}{{'importations/create' == request()->path() ? 'active' : ''}}" href="{{ route('importations.importation.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">login</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('importations.model_plural') }} </span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link {{'exports' == request()->path() ? 'active' : ''}}{{'exports/create' == request()->path() ? 'active' : ''}}" href="{{ route('exports.export.index') }}">
              <div class="text-white text-center ms-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">logout</i>
              </div>
              <span class="nav-link-text me-1">{{ trans('exports.model_plural') }} </span>
            </a>
          </li>

      </ul>
    </div>

  </aside>


