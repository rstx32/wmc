<!DOCTYPE HTML>
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('/dashboard/assets/css/main.css') }}" />

		<noscript><link rel="stylesheet" href="{{ asset('/dashboard/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							@yield('sidebar')
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Intro -->
					<section id="home" class="wrapper style1 fullscreen fade-up">
						<div class="inner">
							<h1>Halo @yield('user')!</h1>
							<p>Selamat datang di live score challenge<br/>
								{{-- Silahkan pergi ke tab <a href="#three">Soal</a> untuk menjawab soal soal yang diberikan<br/>
								Dan lihat di <a href="#three">Live Score</a> untuk mendapatkan informasi skor terupdate<br /> --}}
								@yield('keterangan_user')
							</p>
						</div>
					</section>

				@yield('konten')
				{{-- <!-- Two -->
					<section id="two" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>Live Score</h2>
							<br/>
							<div class="container-table100">
								<div class="wrap-table100">
									<div class="table">
					
										<div class="row header">
											<div class="cell">
												Nama
											</div>
											<div class="cell">
												Skor
											</div>
										</div>
					
										@foreach($user as $peserta)
										<div class="row">
											<div class="cell" data-title="Nama">
												{{$peserta->nama}}
											</div>
											<div class="cell" data-title="Skor">
												{{$peserta->skor}}
											</div>
										</div>
										@endforeach
					
									</div>
								</div>
							</div>
						</div>
					</section> --}}

					
				{{-- <!-- Three -->
					<section id="three" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Soal 1</h2>
							<p>ini adalah soal soal yang diberikan kepada peserta</p>
							
								<section>
									<form method="post" action="#">
										<div class="fields">
											<div class="field half">
												<label for="name">jawaban :</label>
												<input type="text" name="name" id="name" />
											</div>
										</div>
										<ul class="actions">
											<li><a href="" class="button submit">kirim jawaban</a></li>
										</ul>
									</form>
								</section>

								<h2>Soal 2</h2>
								<p>ini adalah soal soal yang diberikan kepada peserta</p>
								
									<section>
										<form method="post" action="#">
											<div class="fields">
												<div class="field half">
													<label for="name">jawaban :</label>
													<input type="text" name="name" id="name" />
												</div>
											</div>
											<ul class="actions">
												<li><a href="" class="button submit">kirim jawaban</a></li>
											</ul>
										</form>
									</section>
								
						</div>
					</section> --}}

			</div>

		{{-- Footer --}}
		<footer id="footer" class="wrapper alt">
			<div class="inner">
				<ul class="menu">
					<li><a href="https://rstx.web.id/">By RSTX</a></li>
				</ul>
			</div>
		</footer>

		<!-- Scripts -->
			<script src="{{ asset('/dashboard/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/util.js') }}"></script>
			<script src="{{ asset('/dashboard/assets/js/main.js') }}"></script>
			@yield('countdown')
	</body>
</html>