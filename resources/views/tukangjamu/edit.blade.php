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
<h1>Ganti {{ $tukangjamu->nama }}</h1>

{!! Html::ul($errors->all()) !!}

{!! Form::model($tukangjamu, array('route' => array('tukangjamu.update', $tukangjamu->id), 'method' => 'PUT')) !!}

    <div class="form-group">
        {!! Form::label('nama', 'Nama') !!}
        {!! Form::text('nama', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('kualitas_jamu', 'Kualitas Jamu') !!}
        {!! Form::select('kualitas_jamu', array('0' => 'Pilih kualitas jamu', '1' => 'KW 1', '2' => 'KW 2', '3' => 'KW 3'), null, array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Ganti Tukang Jamu!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop