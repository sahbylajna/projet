resources/views/test.blade.php
{{-- <!DOCTYPE html>
<html>
<head>
    <title>Example PDF</title>
</head>
<body style="    direction: !important;
padding: 0px 48px!important;">
    <img src="{{ asset('images/logo.png') }}" alt="">
   <div style="    text-align: center!important;
   ">


    <h1> التعهد</h1>
    <p>Some content goes here.</p>



   </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="ar" dir="" >
<head>
  <!-- Design by foolishdeveloper.com -->
    <meta http-equiv="Content-Type" content="text/html!important; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
.col-6 {
    flex: 0 0 auto!important;
    width: 50%!important;
}
*, ::after, ::before {
    box-sizing: unset!important;
}
body {
    margin: 0!important;

    -webkit-text-size-adjust: 100%!important;
    -webkit-tap-highlight-color: #fffecd!important;
}
.row {
    --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
   --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
    display: -webkit-box!important;
    flex-wrap: wrap!important;
    margin-top: 17px!important;
    margin-right: 17px!important;
    margin-left: 17px!important;
    margin-top: calc(-1 * var(--bs-gutter-y))!important;
    margin-right: calc(-.5 * var(--bs-gutter-x))!important;
    margin-left: calc(-.5 * var(--bs-gutter-x))!important;
}

.col-10 {
    flex: 0 0 auto!important;
    width: 83.33333333%!important;
}

body {
            margin: 0px!important;
            padding: 0!important;
           }
           .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: 100%!important;
}

    </style>
    <!--Stylesheet-->

    <!-- jQuery library -->
    <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            direction: ;


        }
</style>


</head>
<body style="
    direction: rtl;
margin: 0px!important;
padding: 0!important;
margin: 0!important;
font-family: DejaVu Sans, sans-serif;
direction: ;
-webkit-text-size-adjust: 100%!important;
-webkit-tap-highlight-color: #fffecd!important;" >
	<div style="    width: 1170px!important;
    padding-right: 15px!important;
    max-width: 100%!important;
    padding-left: 15px!important;
    margin-right: auto!important;
    margin-left: auto!important;">


   <div style="   --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
    /* display: -webkit-box!important;
    max-width: 60%!important; */
    flex-wrap: wrap!important;
    margin-top: 17px!important;
    margin-right: 17px!important;
    margin-left: 17px!important;">

<img src="{{ asset('images/pdf1.png') }}" alt="" style="   float: left!important;">
            <img src="{{ asset('images/pdf2.png') }}" alt="" style="    max-width: 30%!important;float: right!important;">



    </div>
    {{-- <div style="   --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
    display: -webkit-box!important;
    max-width: 60%!important;
    flex-wrap: wrap!important;
    margin-top: 17px!important;
    margin-right: 17px!important;
    margin-left: 17px!important;">


            <img src="{{ asset('images/pdf2.png') }}" alt="" style="    max-width: 30%!important;float: right!important;">



    </div> --}}
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">



    <p style="float: left;">
    @php
        echo date("Y/m/d") ;
    @endphp
    </p>
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">



    <p>
        <br style="    -webkit-box-sizing: border-box!important;">

        <p >        {!! $data['term_ar'] !!}</p>

    </p>
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">
    <br style="    -webkit-box-sizing: border-box!important;">


    <p>{{  $data['first_name'] }} {{ $data['last_name'] }}    </p>
    <p >{{  $data['ud'] }}</p>
    <p >{{  $data['phone'] }}</p>

    <div style="   --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
    display: -webkit-box!important;
    flex-wrap: wrap!important;
    margin-top: 17px!important;
    margin-right: 17px!important;
    margin-left: 17px!important;">
        <div  style="
        flex: 0 0 auto!important;
        width: 100%!important;
    flex-wrap: wrap!important;  --bs-gutter-x: 1.5rem!important;
    --bs-gutter-y: 0!important;
    display: -webkit-box!important;
   ">
           <div  style="  flex: 0 0 auto!important;
            width: 80%!important;">


<img src="{{asset('images/'.$data['singateur'])}}"   alt="" style="    max-width: 60%!important;">

        </div>
    </div>
    </div>




</div>

<br style="    -webkit-box-sizing: border-box!important;">
<br style="    -webkit-box-sizing: border-box!important;">
<footer style="text-align: center;    border-top: 1px solid;    position: absolute;
    bottom: 0;
    width: 100%;">

  <p>  Tel. : +974 44486900, Fax : +974 44486901, P.O.Box : 9692, Doha - Qatar</p>

  <p>  Eamil : Info@hejen.qa</p>
</footer>


</body>

</html>
