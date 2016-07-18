@extends('template.t_index')
@section('title') Data User | @stop
@section('content')

<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <h2><b>Ganti Password</b></h2>
    {{ Form::open(['url' => URL('superadmin/user/'.$data->id.'/proses')]) }}
    {{ Form::hidden('id',$data->id) }}
    <h3>Username : {{ $data->username }}</h3>
    <p></p>
    {{ Form::label('password','New Password') }}
    {{ Form::password('password', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('re-password','Re-New Password') }}
    {{ Form::password('re-password', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop