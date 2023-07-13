<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>اللجنة المنضمة لسباق الهجن</title>
    <style>
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	background: #4d3278;
	display: flex;
	align-items: center;
	justify-content: center;
	height: 100vh;
	font-family: sans-serif;
}

.container {
	max-width: 400px;
	width: 100%;
	background: #FFF;
	padding: 40px;
	border-radius: 20px;
	position: relative;
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

.input {
	padding: 15px;
	outline: none;
	border: 0;
	background: #EEE;
	border-radius: 31px;
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
    </style>
</head>
<body style="direction: rtl;">
    <div class="container">
        <div class="pic">

        </div>
        <h1 class="title">مرحبًا</h1>
        <h2 class="title" >{{ __('login.Login Here') }}</h2>
        <form  method="POST" action="{{ route('clients.client.login') }}" accept-charset="UTF-8" id="create_users_form" name="create_users_form"  class="form">
            {{ csrf_field() }}
            <label for="username">{{ __('login.Username') }}</label>
          <div>
			<input type="text"    style=" width: 65%;" id="username" name="phone" class="input" autocomplete="off" placeholder="{{ __('login.Username') }}" />

            <select name="ccontry_id" id=""  style=" width: 33%;" id="ccontry_id" class="input" autocomplete="off" >
                @foreach ( App\Models\countries::where('active',1)->get() as $countrie)
                <option value="{{ $countrie->id }}">{{ $countrie->phonecode }}+</option>
                @endforeach
            </select>

		  </div>
            <label for="password">{{ __('login.Password') }}</label>
            <input type="password" id="password" name="password" class="input" autocomplete="off" placeholder="{{ __('login.Password') }}" />
            <button type="submit">{{ __('login.Log In') }}</button>
            <a class="title" href="{{ url('singup')}}" ><h2>إنشاء حساب ؟</h2> </a>
        </form>


    </div>
</body>
</html>
