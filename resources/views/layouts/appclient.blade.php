


<!doctype html>
<html class="no-js" lang="">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>اللجنة المنضمة لسباق الهجن</title>
	<meta name="description" content="اللجنة المنضمة لسباق الهجن  ">
	<meta name=”robots” content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo.png')}}">
	<link rel="manifest" href="client/img/favicon/site.webmanifest">
	<link rel="mask-icon" href="client/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="theme-color" content="#ffffff">
	<!-- Place favicon.ico in the root directory -->
	<link rel="stylesheet" href="{{ asset('client/css/normalize.css')}}">
	<link href="{{ asset('client/css/fontawsome/all.min.css')}}" rel="stylesheet">
	<link rel="stylesheet"
		href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css"
		integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
		integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="{{ asset('client/css/main.css')}}">
<style>
    .rtl .avam-container.bmd-drawer-in::before {

    width: 0px!important;
    margin: 0px;
    padding: 0px;
}
:not(.bmd-drawer-out).bmd-drawer-in.bmd-drawer-f-l>.bmd-layout-content {
    padding-right: 0!important;
}
    .side.a-collapse {
    overflow: hidden;
   height: 54px!important;
    padding: 0px;
    font-size: 19px;}
</style>
    @yield('css')
</head>

<body class="rtl">

    <div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
        <header class="bmd-layout-header ">
            <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">

                {{-- <li class="side a-collapse short m-2 pr-1 pl-1 ">
                    <a style="    color: #6c757d;" href="{{ route('client.home') }}" class="side-item  {{'client/home' == request()->path() ? 'selected' : ''}} "><i class="fas fa-tachometer-alt mr-1"></i>لوحة القيادة</a>
                </li> --}}
                <li class="side a-collapse short m-2 pr-1 pl-1 ">
                    <a style="    color: #6c757d;" href="{{ route('importations.client.index') }}" class="side-item {{'client/importations/create' == request()->path() ? 'selected' : ''}} {{'client/importations' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('importations.model_plural') }}</a>
                </li>
                <li class="side a-collapse short m-2 pr-1 pl-1 ">
                    <a style="    color: #6c757d;" href="{{ route('backs.client.index') }}" class="side-item {{'client/backs' == request()->path() ? 'selected' : ''}} {{'client/backs/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('backs.model_plural') }}</a>
                </li>
                <li class="side a-collapse short m-2 pr-1 pl-1 ">
                    <a style="    color: #6c757d;" href="{{ route('exports.client.index') }}" class="side-item  {{'client/exports' == request()->path() ? 'selected' : ''}} {{'client/exports/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('exports.model_plural') }}</a>
                </li>

                <ul class="nav navbar-nav ">
                    {{-- <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle  m-0" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-envelope fa-lg"></i><span
                                    class="badge badge-pill badge-danger animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                            </button>
                            <div aria-labelledby="dropdownMenu2"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                                <span class="dropdown-item dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                                    <span class="float-right-rtl text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-user c-main mr-2"></i> 8 friend requests
                                    <span class="float-right-rtl text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-file c-main mr-2"></i> 3 new reports
                                    <span class="float-right-rtl text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu3"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-bell  fa-lg "></i><span
                                    class="badge badge-pill badge-warning animate__animated animate__flash animate__repeat-3 animate__slower animate__delay-2s">5</span>
                            </button>
                            <div aria-labelledby="dropdownMenu2"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right-lg">
                                <span class="dropdown-item dropdown-header">15 Notifications</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-envelope c-main mr-2"></i> 4 new messages
                                    <span class="float-right-rtl text-muted text-sm">3 mins</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-user c-main mr-2"></i> 8 friend requests
                                    <span class="float-right-rtl text-muted text-sm">12 hours</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="far fa-file c-main mr-2"></i> 3 new reports
                                    <span class="float-right-rtl text-muted text-sm">2 days</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        </div>
                    </li> --}}
                    <li class="nav-item"> <img src="{{ asset('images/logo.png') }}" alt="..."
                            class="rounded-circle screen-user-profile"></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </button>
                            <div aria-labelledby="dropdownMenu4"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenu2">
                                {{-- <button class="dropdown-item" type="button"><i
                                        class="far fa-user fa-sm c-main mr-2"></i>Profile</button>
                                <button onclick="dark()" class="dropdown-item" type="button"><i
                                        class="fas fa-moon fa-sm c-main mr-2"></i>Dark Mode</button>
                                <button class="dropdown-item" type="button"><i
                                        class="fas fa-cog fa-sm c-main mr-2"></i>Setting</button> --}}
                                <button class="dropdown-item" type="button"><i
                                        class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>Sign Out</button>
                            </div>
                        </div>
                    </li>




                </ul>
            </div>
        </header>
       {{-- @include('layouts.sidbarclient') --}}
        <main class="bmd-layout-content">
            <div class="container-fluid ">


                <!-- content -->



                <div class="jumbotron shade pt-5">


                    @yield('content')


                </div>
                <!-- end of content -->



            </div>
        </main>
    </div>

    </div>



    <script src="{{ asset('client/js/vendor/modernizr.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')
    </script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function () {
            $('body').bootstrapMaterialDesign();
        });
    </script>
    <script>
        ! function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (!d.getElementById(id)) {
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://weatherwidget.io/js/widget.min.js';
                fjs.parentNode.insertBefore(js, fjs);
            }
        }(document, 'script', 'weatherwidget-io-js');
    </script>
    <script src="{{ asset('client/js/main.js')}}"></script>
    @yield('js')
</body>
</html>








