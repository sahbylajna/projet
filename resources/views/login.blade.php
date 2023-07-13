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
</head>

<body class="rtl">

    <div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">
        <header class="bmd-layout-header ">
            <div class="navbar navbar-light bg-faded animate__animated animate__fadeInDown">
                <button class="navbar-toggler animate__animated animate__wobble animate__delay-2s" type="button"
                    data-toggle="drawer" data-target="#dw-s1">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="nav navbar-nav ">
                    <li class="nav-item">
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
                    </li>
                    <li class="nav-item">
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
                    </li>
                    <li class="nav-item"> <img src="client/img/user-profile.jpg" alt="..."
                            class="rounded-circle screen-user-profile"></li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn  dropdown-toggle m-0" type="button" id="dropdownMenu4"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                majid
                            </button>
                            <div aria-labelledby="dropdownMenu4"
                                class="dropdown-menu dropdown-menu-right dropdown-menu dropdown-menu-right"
                                aria-labelledby="dropdownMenu2">
                                <button class="dropdown-item" type="button"><i
                                        class="far fa-user fa-sm c-main mr-2"></i>Profile</button>
                                <button onclick="dark()" class="dropdown-item" type="button"><i
                                        class="fas fa-moon fa-sm c-main mr-2"></i>Dark Mode</button>
                                <button class="dropdown-item" type="button"><i
                                        class="fas fa-cog fa-sm c-main mr-2"></i>Setting</button>
                                <button class="dropdown-item" type="button"><i
                                        class="fas fa-sign-out-alt c-main fa-sm mr-2"></i>Sign Out</button>
                            </div>
                        </div>
                    </li>




                </ul>
            </div>
        </header>
        <div id="dw-s1" class="bmd-layout-drawer bg-faded">

            <div class="container-fluid side-bar-container">
                <header class="pb-0">
                    <a class="navbar-brand">
                        <object class="side-logo" data="./svg/logo-8.svg" type="image/svg+xml">
                        </object>
                    </a>
                </header>
                <p class="side-comment">Tour</p>
                <li class="side a-collapse short ">
                    <a href="./fa.html" class="side-item "><i class="fas fa-language  mr-1"></i>Persian <span
                            class="badge badge-pill badge-success">new</span></a>
                </li>
                <ul class="side a-collapse short ">
                    <a class="ul-text"><i class="fas fa-tachometer-alt mr-1"></i> Pages
                        <i class="fas fa-chevron-down arrow"></i></a>
                    <div class="side-item-container hide animated">
                        <li class="side-item "><a href="./"><i class="fas fa-angle-right mr-2"></i>Dashboard</a>
                        </li>
                        <li class="side-item"><a href="./dark.html"><i class="fas fa-angle-right mr-2"></i>Dark
                                Dashboard</a></li>
                        <li class="side-item"><a href="./Login.html"><i class="fas fa-angle-right mr-2"></i>Login</a>
                        </li>
                        <li class="side-item"><a href="./glogin.html"><i class="fas fa-angle-right mr-2"></i>Login
                                Colored</a></li>
                    </div>
                </ul>

                <ul class="side a-collapse ">
                    <a class="ul-text"><i class="fas fa-cog mr-1"></i> Customize
                        <i class="fas fas fa-chevron-down arrow"></i></a>
                    <div class="side-item-container ">
                        <li class="side-item"><a href="./color.html"><i class="fas fa-angle-right mr-2"></i>Color</a>
                        </li>
                        <li class="side-item"><a href="./typo.html"><i
                                    class="fas fa-angle-right mr-2"></i>Typography</a></li>
                        <li class="side-item"><a href="./dark-mode.html"><i class="fas fa-angle-right mr-2"></i>Dark
                                Mode</a></li>
                        <li class="side-item selected"><a href="./rtl.html"><i class="fas fa-angle-right mr-2"></i>Rtl</a></li>
                        <li class="side-item"><a href="./sidebar.html"><i
                                    class="fas fa-angle-right mr-2"></i>SideBar</a></li>
                    </div>
                </ul>
                <p class="side-comment">Element</p>
                <li class="side a-collapse short ">
                    <a href="./animation.html" class="side-item "><i class="fas fa-fan fa-spin mr-1"></i>Animation</a>
                </li>
                <li class="side a-collapse short ">
                    <a href="./Icon.html" class="side-item "><i class="fas fa-icons  mr-1"></i>Icon</a>
                </li>

                <ul class="side a-collapse short ">
                    <a class="ul-text"><i class="fas fa-cube mr-1"></i> Base Component <span
                            class="badge badge-danger">9</span><i class="fas fas fa-chevron-down arrow"></i></a>
                    <div class="side-item-container hide animated">
                        <li class="side-item"><a href="./alert.html"><i class="fas fa-angle-right mr-2"></i>alert</a>
                        </li>
                        <li class="side-item"><a href="./badge.html"><i class="fas fa-angle-right mr-2"></i>Badge</a>
                        </li>
                        <li class="side-item"><a href="./breadcrumb.html"><i
                                    class="fas fa-angle-right mr-2"></i>Breadcrumb</a></li>
                        <li class="side-item"><a href="./button.html"><i class="fas fa-angle-right mr-2"></i>Button</a>
                        </li>
                        <li class="side-item"><a href="./card.html"><i class="fas fa-angle-right mr-2"></i>Card</a></li>
                        <li class="side-item"><a href="./collapse.html"><i
                                    class="fas fa-angle-right mr-2"></i>Collapse</a></li>
                        <li class="side-item"><a href="./Input.html"><i class="fas fa-angle-right mr-2"></i>Input</a>
                        </li>
                        <li class="side-item"><a href="./jumborton.html"><i
                                    class="fas fa-angle-right mr-2"></i>Jumborton</a></li>
                        <li class="side-item"><a href="./pagination.html"><i
                                    class="fas fa-angle-right mr-2"></i>Pagination</a></li>
                        <li class="side-item"><a href="./progress.html"><i
                                    class="fas fa-angle-right mr-2"></i>Progress</a></li>
                    </div>
                </ul>
                <ul class="side a-collapse short">
                    <a class="ul-text"><i class="fas fa-layer-group mr-1"></i>Extra Component
                        <i class="fas fas fa-chevron-down arrow"></i></a>
                    <div class="side-item-container hide animated">
                        <li class="side-item"><a href="./modal.html"><i class="fas fa-angle-right mr-2"></i>Modal</a>
                        </li>
                        <li class="side-item"><a href="./toast.html"><i class="fas fa-angle-right mr-2"></i>Toast</a>
                        </li>
                        <li class="side-item"><a href="./widget.html"><i class="fas fa-angle-right mr-2"></i>Widget</a>
                        </li>
                        <li class="side-item"><a href="./Chart.html"><i class="fas fa-angle-right mr-2"></i>Chart</a>
                        </li>

                    </div>
                </ul>

                <p class="side-comment">support</p>
                <li class="side a-collapse short ">
                    <a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i
                            class=" fab fa-github mr-1"></i>GitHub</a>
                </li>
                <li class="side a-collapse short ">
                    <a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i
                            class=" far fa-question-circle mr-1"></i>Submit Issue</a>
                </li>
                <li class="side a-collapse short ">
                    <a href="https://github.com/MajidAlinejad/Nozha-rtl-Dashboard" class="side-item  "><i
                            class=" far fa-life-ring mr-1"></i>Help</a>
                </li>

                <p class="side-comment">donate</p>
                <li class="side a-collapse short pb-5">
                    <a href="https://donateon.ir/alinejad.mj" class="side-item  "><i class=" fas fa-coffee mr-1"></i>Buy
                        me a coffee</a>
                </li>


            </div>

        </div>
        <main class="bmd-layout-content">
            <div class="container-fluid ">


                <!-- content -->

                <div class="row">
                    <div class="page-header breadcrumb-header  p-3 mr-2 ml-2 m-2">
                        <div class="row align-items-end ">
                            <div class="col-lg-8">
                                <div class="page-header-title text-left-rtl">
                                    <div class="d-inline">
                                        <h3 class="lite-text ">Right To Left</h3>
                                        <span class="lite-text text-gray">option of rtl and ltr </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item "><a href="#">Customise</a></li>
                                    <li class="breadcrumb-item active">rtl</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="jumbotron shade pt-5">
                    <h1>Right to Left</h1>
                    <div class="d-flex justify-content-between p-2 bd-highlight c-grey font-weight-light font-italic">
                        How to turn ltr to rtl. <button type="button" onclick="rtl()" data-toggle="button"
                            aria-pressed="false" autocomplete="off"
                            class="btn f-glass f-toggle-first outlined c-first o-first p-2 pr-3 pl-3">Right to
                            Left</button></div>
                    <hr class="hr-dashed">

                    <h4 class="c-grey pt-3 pb-3">Code</h4>
                    <p class="c-main font-weight-light font-italic"> Easy,just add rtl class to body! </p>

                    <code class="c-grey">
                        <code>
                            <</code> body class=" <strong class=" c-danger">rtl</strong> " <code>></code>
                        </code>

                        <hr class="hr-dashed">
                        <blockquote class="blockquote pt-3 pb-3">
                            <h4 class="c-grey ">Text Position for Right to Left Language</h4>
                            <footer class="blockquote-footer text-left-rtl lite-text "> basically this classes
                                reverse
                                right with left in rtl mode.</footer>
                        </blockquote>
                        <div class="bd-example c-grey">
                            <p class="text-left-rtl">use the <span class="fnt-code c-primary ">text-left-rtl</span>
                                class to have a <span class="c-third font-weight-bold ">left text.</span></p>
                            <p class="text-right-rtl">use the <span class="fnt-code c-primary ">text-right-rtl</span>
                                class to have a <span class="c-third font-weight-bold ">right text.</span></p>

                        </div>
                        <hr class="hr-dashed">

                        <blockquote class="blockquote pt-3 pb-3">
                            <h4 class="c-grey ">Static Text Position</h4>
                            <footer class="blockquote-footer text-left-rtl lite-text "> static position of text.
                            </footer>
                        </blockquote>
                        <div class="bd-example c-grey">
                            <p class="text-left">use the <span class="fnt-code c-primary ">text-left</span> class to
                                have a <span class="c-third font-weight-bold">left text.</span></p>
                            <p class="text-center">use the <span class="fnt-code c-primary ">text-center</span>
                                class to
                                have a <span class="c-third font-weight-bold">center text.</span></p>
                            <p class="text-right">use the <span class="fnt-code c-primary ">text-right</span> class
                                to
                                have a <span class="c-third font-weight-bold">right text.</span></p>

                        </div>

                        <hr class="hr-dashed">
                        <blockquote class="blockquote pt-3 pb-3">
                            <h4 class="c-grey ">Static Text Direction</h4>
                            <footer class="blockquote-footer text-left-rtl lite-text "> force Direction of text.
                            </footer>
                        </blockquote>
                        <div class="bd-example c-grey">

                            <p class="text-dir-ltr text-left">This Text forced left to right using the class : <span
                                    class="fnt-code c-primary ">text-dir-ltr</span> </p>
                            <p class="text-dir-ltr text-left">این نوشته چپ چین است با استفاده از کلاس : <span
                                    class="fnt-code c-primary ">text-dir-ltr</span> </p>

                            <p class="text-dir-rtl text-right">این نوشته راستچین است با استفاده از کلاس : <span
                                    class="fnt-code c-primary ">text-dir-ltr</span> </p>
                            <p class="text-dir-rtl text-right">This Text forced right to left using the class :
                                <span class="fnt-code c-primary ">text-dir-ltr</span> </p>


                        </div>




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

</body>
</html>

