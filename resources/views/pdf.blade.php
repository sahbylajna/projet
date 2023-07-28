<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--Stylesheet-->

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="form">
        <h3>{{ trans('terms.model_plural') }}</h3>

    <p>
       
        {{ $data['term_ar']}}
    </p>
    <br>
    <br>
    <br>
    <p style="
    align-self: center;">{{  $data['first_name'] }} {{ $data['last_name'] }}</p>
    <br>
    <img src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(public_path('images/'.$data['singateur']))); ?>" style="    width: 464px;
    align-self: center;" alt="">

    </form>

</div>






<br>

    <!-- Latest compiled and minified JavaScript -->

</body>
</html>
