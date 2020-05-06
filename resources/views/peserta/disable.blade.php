@extends('layouts.dashboard')
@section('title', 'Dashboard Peserta')
@section('user')
  {{ Auth::user()->name }}
@endsection
@section('sidebar')
    <li><a href="#home">Home</a></li>
    <li><a href="#score">Live Score</a></li>
    <li><a href="#soal">Soal</a></li>
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
        Input Jawaban Tidak Diijinkan
    </div>
</section>
@endsection
