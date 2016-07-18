@extends('template.t_index')
@section('title') Tambah User | @stop
@section('content')
<div class="container">
    <h2><b>TAMBAH USER</b></h2>
    {{ Form::open(['url' => URL('superadmin/user/baru/proses')]) }}
    {{ Form::label('username','Username') }}
    {{ Form::text('username', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('nama','Nama User') }}
    {{ Form::text('nama', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('email','Email') }}
    {{ Form::email('email', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('level','Level') }}
    {{ Form::select('level', ['SuperAdmin' => 'SuperAdmin','Admin' => 'Admin','Member' => 'Member'],'', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop