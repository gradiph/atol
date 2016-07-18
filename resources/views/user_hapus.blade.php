@extends('template.t_index')
@section('title') Hapus User | @stop
@section('content')
<div class="container">
    <h2><b>HAPUS USER</b></h2>
    {{ Form::open(['url' => URL('superadmin/user/$data->id/hapus/proses')]) }}
    {{ Form::hidden('id',$data->id) }}
    {{ Form::label('username','Username') }}
    {{ Form::text('username', $data->username, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('nama','Nama User') }}
    {{ Form::text('nama', $data->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('email','Email') }}
    {{ Form::email('email', $data->email, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('level','Level') }}
    {{ Form::select('level', ['SuperAdmin','Admin','Member'],$data->level, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop