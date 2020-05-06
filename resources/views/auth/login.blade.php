{{-- @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="{{ asset('/login_master/images/icons/favicon.ico') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/animate/animate.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/select2/select2.min.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/login_master/css/main.css') }}">
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
				<span class="login100-form-title p-b-37">
					Login Live Score Challenge
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <input id="email" placeholder="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                    <input id="password" type="password" placeholder="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    <span class="focus-input100"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" >
						{{ __('Login') }}
					</button>
				</div>
				<br/>

				<div class="text-center">
					<a href="#" class="txt2 hov1">
						belum punya akun? register
					</a>
				</div>
			</form>

			
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
	<script src="{{ asset('/login_master/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/animsition/js/animsition.min.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/select2/select2.min.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('/login_master/vendor/countdowntime/countdowntime.js') }}"></script>
	<script src="{{ asset('/login_master/js/main.js') }}"></script>

</body>
</html>