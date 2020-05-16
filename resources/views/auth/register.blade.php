@extends('layouts.form')
@section('judul','Registrasi')
@section('konten')
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
				<span class="login100-form-title p-b-37">
					Registrasi Peserta
                </span>
                
                <div class="wrap-input100 validate-input m-b-20 form-group" data-validate="Masukan nama">
                    <input id="name" placeholder="nama" type="text" class="input100 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <span class="focus-input100"></span>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>

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
                
                <div class="wrap-input100 validate-input m-b-25" data-validate = "Konfirmasi password">
                    <input id="password-confirm" type="password" placeholder="konfirmasi password" class="input100 @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                    <span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" >
						{{ __('Register') }}
					</button>
				</div>
				<br/>

				<div class="text-center">
					<a href="/admin" class="txt2 hov1">
						sudah punya akun? login
					</a>
				</div>
			</form>
		</div>
	</div>
@endsection