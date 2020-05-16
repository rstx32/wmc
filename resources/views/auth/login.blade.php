@extends('layouts.form')
@section('judul','Login')
@section('konten')
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
				<span class="login100-form-title p-b-37">
					Login Live Score Challenge
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Masukan email">
                    <input id="email" placeholder="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    <span class="focus-input100"></span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Masukan password">
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
					<a href="/register" class="txt2 hov1">
						belum punya akun? register
					</a>
				</div>
			</form>
		</div>
	</div>
@endsection