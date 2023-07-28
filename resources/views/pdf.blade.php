<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
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
