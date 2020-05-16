@extends('layouts.dashboard')
@section('title', 'Dashboard Peserta')
@section('user')
  {{ Auth::user()->name }}
@endsection
@section('sidebar')
    <li><a href="#home">Home</a></li>
    <li><a href="#score">Live Score</a></li>
    <li><a href="#soal">Soal</a></li>
    <li>Sisa Waktu : <p id="countdown"></p></li>
    <li>
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>
@endsection
@section('konten')
<section id="score" class="wrapper style3 fade-up">
    <div class="inner">
        <h2>Live Score</h2>
        <br/>
        <div class="container">
            <table class="table table-primary table-hover score">
                <thead>
                  <tr>
                    <th text-align="center" scope="col">Ranking</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Skor</th>
                  </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($user as $peserta)
                  <tr>
                    <th>{{$no++}}</th>
                    <td>{{$peserta->name}}</td>
                    <td>{{$peserta->email}}</td>
                    <td>{{$peserta->skor}}</td>
                  </tr>
                @endforeach
                </tbody>
              </table>
        </div>
    </div>
</section>
<section id="soal" class="wrapper style1 fade-up">
    <div class="inner">
      <h2>Soal</h2>
      <br>
        <div class="container">
          <table class="table table-primary table-hover">
              <thead>
                <tr>
                  <th scope="col">Soal</th>
                  <th scope="col">Poin</th>
                  <th scope="col">Jawaban</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
              @foreach($soal as $s)
                <tr>
                  <td>{{$s->soal}}</td>
                  <td>{{$s->poin}}</td>
                  <td>
                    <form method="post" action="/peserta/submit/{{$s->id}}">
                      <input type="hidden" name="id" value="{{$s->id}}">
                      @csrf
                      <div class="fields">
                          <div class="field">
                              <input type="text" name="jawaban" id="jawaban" />
                          </div>
                      </div>
                  </td>
                  <td><input type="submit" class="button submit" value="Kirim"></td>
                </form>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
    </div>
</section>
@endsection
@section('countdown')
<script>
  // Mengatur waktu akhir perhitungan mundur
  var countDownDate = new Date("{{$waktu}}").getTime();
  
  // Memperbarui hitungan mundur setiap 1 detik
  var x = setInterval(function() {
  
    // Untuk mendapatkan tanggal dan waktu hari ini
    var now = new Date().getTime();
    
    
    // Temukan jarak antara sekarang dan tanggal hitung mundur
    var distance = countDownDate - now;
    
    // Perhitungan waktu untuk hari, jam, menit dan detik
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Keluarkan hasil dalam elemen dengan id = "demo"
    document.getElementById("countdown").innerHTML = hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // Jika hitungan mundur selesai, tulis beberapa teks 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "Habis";
    }
  }, 1000);
  </script>
@endsection