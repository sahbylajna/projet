{{-- <!DOCTYPE html>
<html>
<head>
    <title>Example PDF</title>
</head>
<body style="    direction: rtl;
padding: 0px 48px;">
    <img src="{{ asset('images/logo.png') }}" alt="">
   <div style="    text-align: center;
   ">


    <h1> التعهد</h1>
    <p>Some content goes here.</p>



   </div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta http-equiv="Content-Language" content="ar">
    <style>

        body { font-family: DejaVu Sans, sans-serif;
            direction: rtl; }
    </style>
    <!--Stylesheet-->

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <img src="{{ asset('images/logo.png') }}" alt="">

    <form class="form" style="text-align: -webkit-center!important;">
        <h3>التعهد</h3>

    <p>

        {{ $data['term_ar']}}
    </p>
    <br>
    <br>
    <br>
    <p style="
    align-self: center;">{{  $data['first_name'] }} {{ $data['last_name'] }}</p>
    <br>
    <img src="{{asset('images/'.$data['singateur'])}}" style="    width: 464px;
    align-self: center;" alt="">

    </form>

</div>






<br>

    <!-- Latest compiled and minified JavaScript -->

</body>
</html>
