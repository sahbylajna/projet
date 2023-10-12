<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <!-- Design by foolishdeveloper.com -->
  <title>اللجنة المنضمة لسباق الهجن</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">

body {
	background: #83482d;
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
	border: 10px solid #83482d;
	/* background: linear-gradient(to right, #c68263, #6e48aa); */
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
	background: linear-gradient(to right, #c68263, #6e48aa);
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


    <form method="POST" action="{{ route('clients.client.signature', $id) }}"  onsubmit="return validateForm()" enctype="multipart/form-data"  id="edit_client_form" name="edit_client_form" accept-charset="UTF-8" class="form">
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PUT">
        <h3>{{ trans('terms.model_plural') }}</h3>

        <input type="hidden" name="id" value="{{ $id }}">
        <p>
            @php
                $term = App\Models\term::first();
            @endphp
            {!!  $term->term_ar !!}
        </p>

        <label for="password">{{ __('login.signature') }}</label>

<input type="checkbox" name="c" id="c" required>
            <div class="wrapper left">
                <canvas id="signature-pad"  width="400" height="200"></canvas>
            </div>
            <div class="">
                <a id="clear"><span> Clear </span></button>
            </div>
<input type="hidden" id="canvasimg" name="signature" alt="" required>


<br>

        <button type="submit">{{ __('login.Log In') }}</button>

    </form>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.3.5/signature_pad.min.js" integrity="sha512-kw/nRM/BMR2XGArXnOoxKOO5VBHLdITAW00aG8qK4zBzcLVZ4nzg7/oYCaoiwc8U9zrnsO9UHqpyljJ8+iqYiQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
           var canvas = document.getElementById("signature-pad");

           function resizeCanvas() {
               var ratio = Math.max(window.devicePixelRatio || 1, 1);
               canvas.width = canvas.offsetWidth * ratio;
               canvas.height = canvas.offsetHeight * ratio;
               canvas.getContext("2d").scale(ratio, ratio);


           }
           window.onresize = resizeCanvas;
           resizeCanvas();

           var signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgb(250,250,250)'
           });

           document.getElementById("clear").addEventListener('click', function(){
            signaturePad.clear();

           })

          function validateForm() {
            document.getElementById('canvasimg').value = canvas.toDataURL();
            if(document.getElementById('canvasimg').value == null){
                return false;
            }
            return true;
          }


       </script>
</body>
</html>
