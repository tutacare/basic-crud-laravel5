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

<h1>Input Data Tukang Jamu</h1>

<!-- ini untuk mendeteksi error -->
{!! Html::ul($errors->all()) !!}

{!! Form::open(array('url' => 'tukangjamu')) !!}

    <div class="form-group">
        {!! Form::label('nama', 'Nama') !!}
        {!! Form::text('nama', Input::old('nama'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', Input::old('email'), array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('kualitas_jamu', 'Kualitas Jamu') !!}
        {!! Form::select('kualitas_jamu', array('0' => 'Pilih Kualitas Jamu', '1' => 'KW 1', '2' => 'KW 2', '3' => 'KW 3'), Input::old('kualitas_jamu'), array('class' => 'form-control')) !!}
    </div>

    {!! Form::submit('Input Data!', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
@stop