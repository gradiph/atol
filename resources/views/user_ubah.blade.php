@extends('template.t_index')
@section('title') Ubah User | @stop
@section('content')
<div class="container">
    <h2><b>UBAH USER</b></h2>
    {{ Form::open(['url' => URL('superadmin/user/$data->id/ubah/proses')]) }}
    {{ Form::hidden('id',$data->id) }}
    {{ Form::label('username','Username') }}
    {{ Form::text('username', $data->username, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('nama','Nama User') }}
    {{ Form::text('nama', $data->nama, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('email','Email') }}
    {{ Form::email('email', $data->email, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('level','Level') }}
    {{ Form::select('level', ['SuperAdmin' => 'SuperAdmin','Admin' => 'Admin','Member' => 'Member'],$data->level, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop