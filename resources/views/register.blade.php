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

    margin-top: 53px;
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
    transform: translate(-50%,-50%);
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
    color: #ffffff;
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
    </style>
</head>
<body>

    @php
    $countries =   App\Models\countries::where('active',1)->get();

  @endphp
    <form  method="POST" action="{{ route('clients.client.sungupp') }}" enctype="multipart/form-data" accept-charset="UTF-8" id="create_client_form" name="create_client_form" class="form">
        {{ csrf_field() }}



        <div id="container">








        <div id="left" class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
            <label for="first_name" class="col-md-2 control-label">{{ trans('clients.first_name') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="first_name" type="text" id="first_name" value="" minlength="1" placeholder="{{ trans('clients.first_name__placeholder') }}">
                {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
            <label for="last_name" class="col-md-2 control-label">{{ trans('clients.last_name') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="last_name" type="text" id="last_name" value="" minlength="1" placeholder="{{ trans('clients.last_name__placeholder') }}">
                {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
            <label for="phone" class="col-md-2 control-label">{{ trans('clients.phone') }}</label>
            <div class="row">

                <div id="left">
                <input required class="form-control" name="phone" type="number" id="phone" value="" minlength="1" placeholder="{{ trans('clients.phone__placeholder') }}">
                {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
            <div id="left">
                <select class="form-control select-css " id="contry_id" name="contry_id">
                        <option value="" style="display: none;" disabled selected>{{ trans('clients.contry_id__placeholder') }}</option>
                    @foreach ($countries as  $contry)
                        <option value="{{ $contry->id }}" >
                            {{ $contry->phonecode }}+
                        </option>
                    @endforeach
                </select>

                {!! $errors->first('contry_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email" class="col-md-2 control-label">{{ trans('clients.email') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="email" type="email" id="email" value="" placeholder="{{ trans('clients.email__placeholder') }}">
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="right" class="form-group {{ $errors->has('ud') ? 'has-error' : '' }}">
            <label for="ud" class="col-md-2 control-label">{{ trans('clients.ud') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="ud" type="number" min="11111111111" max="99999999999" id="ud" value="" minlength="1" placeholder="{{ trans('clients.ud__placeholder') }}">
                {!! $errors->first('ud', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('photo_ud_frent') ? 'has-error' : '' }}">
            <label for="photo_ud_frent" class="col-md-2 control-label">{{ trans('clients.photo_ud_frent') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="photo_ud_frent" type="file" id="photo_ud_frent" value="" minlength="1" placeholder="{{ trans('clients.photo_ud_frent__placeholder') }}">
                {!! $errors->first('photo_ud_frent', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('photo_ud_back') ? 'has-error' : '' }}">
            <label for="photo_ud_back" class="col-md-2 control-label">{{ trans('clients.photo_ud_back') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="photo_ud_back" type="file" id="photo_ud_back" value="" minlength="1" placeholder="{{ trans('clients.photo_ud_back__placeholder') }}">
                {!! $errors->first('photo_ud_back', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div id="left" class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="col-md-2 control-label">{{ trans('clients.password') }}</label>
            <div class="col-md-10">
                <input required class="form-control" name="password" type="password" id="password" value="" placeholder="{{ trans('clients.password__placeholder') }}">

            </div>
        </div>

        <div id="left" class="form-group ">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('clients.password_confirmation') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
        <button>{{ __('login.Login') }}</button>



    </div>
    </form>
</body>
</html>
