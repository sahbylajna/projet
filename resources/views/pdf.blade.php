<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    {{-- <title>اللجنة المنضمة لسباق الهجن</title> --}}
    <style media="screen">

body {
	background: #4d3278;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	font-family: sans-serif;
}


.pic {
    background-image: url({{ asset('images/logo-modified.png') }});
    background-repeat: no-repeat;
    background-position: center center;
	position: absolute;
	top: 0;
	left: 50%;
	width: 140px;
	height: 140px;
	border-radius: 50%;
	font-size: 24px;
	color: #ffffff;
	text-align: center;
	line-height: 60px;
	border: 10px solid #4d3278;
	/* background: linear-gradient(to right, #9d50bb, #6e48aa); */
	transform: translate(-50%, -50%);
}

.form {
    background: #FFF;
    border-radius: 20px;
	display: flex;
	flex-direction: column;
}

.title {
	text-align: center;

    margin-top: 30px;
}

label,
.links,
button {
	margin-top: 20px;
}

label {
	margin-top: 20px;
	font-size: 16px;
	color: rgb(77, 77, 77);
	font-weight: 600;
    margin-bottom: 12px;

}


button {
	background: linear-gradient(to right, #9d50bb, #6e48aa);
	padding: 14px;
	border: 0;
	color: #fff;
	font-size: 15px;
	letter-spacing: 1px;
	border-radius: 31px;
	text-transform: uppercase;
}

      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

.background{
    width: 430px;

    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{

    width: auto;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-6%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;

    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    margin-top: 20px;
    font-size: 16px;
    color: rgb(77, 77, 77);
    font-weight: 600;
    margin-bottom: 12px;
}
select,input{
    padding: 15px;
    outline: none;
    border: 0;
    background: #EEE;
    border-radius: 31px;
    display: block;
    height: 50px;
    color: rgb(77, 77, 77);
    width: 100%;



    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;

    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;

    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}
#container {width:100%; font-size: 0;}
#left, #middle, #right {display: inline-block; *display: inline; zoom: 1; vertical-align: top; font-size: 12px;padding: 5px;}
#left {width: 40%; }
#middle {width: 50%; }
#right {width: 100%;}

.flex-row {
    display: flex;
}
.wrapper {
    border: 1px solid #4b00ff;
    border-right: 0;
}
canvas#signature-pad {
    background: #fff;
    width: 100%;
    height: 100%;
    cursor: crosshair;
}
button#clear {
    height: 100%;
    background: #4b00ff;
    border: 1px solid transparent;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}
button#clear span {

    display: block;
}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form class="form">
        <h3>{{ trans('terms.model_plural') }}</h3>

    <p>
        @php
            $term = App\Models\term::first();


        @endphp
        {{ $term->term_ar }}
    </p>
    <br>
    <br>
    <br>
    <p style="
    align-self: center;">{{  $data['first_name'] }} {{ $data['last_name'] }}</p>
    <br>
    <img src="{{ asset('images/'.$data['singateur']) }}" style="    width: 464px;
    align-self: center;" alt="">

    </form>

</div>








<br>

    <!-- Latest compiled and minified JavaScript -->

</body>
</html>
