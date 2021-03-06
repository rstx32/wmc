
<!DOCTYPE HTML>
<html>
	<head>
		<title>Live Scoring - Edit Soal</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{ asset('/dashboard/assets/css/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ asset('/dashboard/assets/css/noscript.css') }}" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a href="index.html" class="title">Edit Soal</a>
				<nav>
					<ul>
						<li><a href="/admin#three">Kembali Ke Daftar Soal</a></li>
					</ul>
				</nav>
			</header>

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Main -->
                <section id="main" class="wrapper">
                    <div class="inner">
                        <h2>Edit Soal</h2>
                        <p>ini adalah soal yang diberikan kepada peserta</p>
                        <section>
                        @foreach($soal as $s)
						<form method="post" action="/admin/update/{{$s->id}}">
                            @csrf
                            {{ method_field('PUT') }} 
                            <input type="hidden" name="id" value="{{$s->id}}">
                                <div class="fields">
                                    <div class="field">
                                        <label for="name">Soal :</label>
                                    <input type="text" name="soal" id="soal" value="{{$s->soal}}" />
                                    </div>
                                    <div class="field half">
                                        <label for="name">Jawaban :</label>
                                    <input type="text" name="jawaban" id="jawaban" value="{{$s->jawaban}}" />
									</div>
									<div class="field half">
                                        <label for="name">Poin :</label>
                                        <input type="text" name="poin" id="poin" value="{{$s->poin}}"/>
                                    </div>
                                </div>
                                <ul class="actions">
									<li><input type="submit" class="button submit" value="Simpan"></li>
                                </ul>
                            </form>
                            @endforeach
                        </section>
                    </div>
                </section>
			</div>

		<!-- Footer -->
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

	</body>
</html>