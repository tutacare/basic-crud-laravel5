@extends('tukangjamu.master')

@section('title', 'Aplikasi Tukang Jamu')

@section('content')
    <nav class="navbar navbar-inverse">
    <div class="navbar-header">
    <a class="navbar-brand" href="{{ URL::to('tukangjamu') }}">Tukang Jamu</a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="{{ URL::to('tukangjamu') }}">Lihat Semua Tukang Jamu</a></li>
    <li><a href="{{ URL::to('tukangjamu/create') }}">Input Data Tukang Jamu</a>
    </ul>
    </nav>
<h1>Menampilkan data lengkap {{ $tukangjamu->nama }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $tukangjamu->nama }}</h2>
        <p>
            <strong>Email:</strong> {{ $tukangjamu->email }}<br>
            <strong>Kualitas Jamu:</strong> {{ $tukangjamu->kualitas_jamu }}
        </p>
    </div>
@stop