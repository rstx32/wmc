@extends('layouts.dashboard')
@section('title', 'Dashboard Admin')
@section('user', 'Administrator')
@section('sidebar')
    <li><a href="#home">Home</a></li>
    <li><a href="#score">Live Score</a></li>
    <li><a href="#soal">Soal</a></li>
    <li><a href="#sesi">Sesi</a></li>
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
@section('keterangan_user')
    Silahkan pergi ke tab <a href="#score">Daftar Soal</a> untuk mengatur soal untuk peserta<br />
    Dan lihat di <a href="#soal">Live Score</a> untuk mendapatkan informasi skor terupdate<br/>
    Juga lihat di <a href="#sesi">Sesi</a> untuk mengatur sesi lomba<br/>
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
        <a href="/admin/exportPDF" target="_blank" class="button">Export PDF</a></li>
    </div>
</section>
<section id="soal" class="wrapper style1 fade-up">
    <div class="inner">
        <h2>Daftar Soal</h2>
        <br>
        <div class="container">
          <table class="table table-primary table-hover">
              <thead>
                <tr>
                  <th text-align="center" scope="col">No</th>
                  <th scope="col">Soal</th>
                  <th scope="col">Jawaban</th>
                  <th scope="col">Poin</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
              @php $no = 1; @endphp
              @foreach($soal as $s)
                <tr>
                  <th>{{$no++}}</th>
                  <td>{{$s->soal}}</td>
                  <td>{{$s->jawaban}}</td>
                  <td>{{$s->poin}}</td>
                  <td>
                    <a href="/admin/edit/{{ $s->id }}" class="btn btn-warning">Edit</a>
                    <a href="/admin/hapus/{{ $s->id }}" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <a href="/admin/create" target="blank" class="button">Buat Soal Baru</a></li>
        </div>
</section>
<section id="sesi" class="wrapper style3 fade-up">
  <div class="inner">
      <h2>Sesi</h2>
      <br/>
      <div class="container">
      @foreach($status as $s) 
          <form method="post" action="/admin/mulaiSesi">
            @csrf
            <div class="fields">
              <div class="field">
                <table class="table score">
                  <tr>
                    <td>
                      <h3>Status Sesi</i></h3>
                    </td> 
                    <td>
                      {{$s->status}}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h3>Waktu Mulai</i></h3>
                    </td> 
                    <td>
                      {{$s->wkt_mulai}}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h3>Waktu Selesai</i></h3>
                    </td> 
                    <td>
                      {{$s->wkt_selesai}}
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h3>Sisa Waktu</i></h3>
                    </td> 
                    <td>
                      <p id="countdown"></p>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <label for="name">Durasi Lomba (menit)</label>
                    </td>
                    <td>
                      <input type="text" name="durasi" id="durasi" />
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="/admin/hapusData" class="button">Hapus Semua Data</a></li>
                    </td>
                    <td>
                      <input type="submit" class="button submit" value="Mulai Sesi"/>
                    </td>
                  </tr>
                </table>
              </div>
          </form>
        @endforeach
      </div>
    </div>
</section>
@endsection
@section('countdown')
<script>
  // Mengatur waktu akhir perhitungan mundur
  @foreach($status as $s)
  var countDownDate = new Date("{{$s->wkt_selesai}}").getTime();
  @endforeach
  
  
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
      document.getElementById("countdown").innerHTML = "Habis";
    }
  }, 1000);
  </script>
@endsection