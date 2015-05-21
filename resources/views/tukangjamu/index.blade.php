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
    <h1>Daftar Semua Tukang Jamu</h1>

<!-- untuk menampilkan pesan -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Kualitas Jamu</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tukangjamu as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->email }}</td>
            <td>{{ $value->kualitas_jamu }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('tukangjamu/' . $value->id) }}">Tampilkan</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('tukangjamu/' . $value->id . '/edit') }}">Ganti</a>
                {!! Form::open(array('url' => 'tukangjamu/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit('Hapus', array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@stop