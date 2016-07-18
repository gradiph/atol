@extends('template.t_index')
@section('title') Hapus Pemilik Usaha | @stop
@section('content')
<div class="container">
    <h2><b>HAPUS PEMILIK USAHA</b></h2>
    {{ Form::open(['url' => URL('admin/pemilik-usaha/$data->id/hapus/proses')]) }}
    {{ Form::hidden('id',$data->id) }}
    {{ Form::label('nama','Nama') }}
    {{ Form::text('nama', $data->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('email','Email') }}
    {{ Form::text('email', $data->email, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('no_ktp','No KTP') }}
    {{ Form::text('no_ktp', $data->no_ktp, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('gambar_ktp','File KTP') }}
    {{ Form::text('gambar_ktp', $data->gambar_ktp, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('no_hp','No HP') }}
    {{ Form::text('no_hp', $data->no_hp, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('alamat','Alamat Rumah') }}
    {{ Form::text('alamat', $data->alamat, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('tempat_lahir','Tempat Lahir') }}
    {{ Form::text('tempat_lahir', $data->tempat_lahir, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('tgl_lahir','Tanggal Lahir') }}
    {{ Form::date('tgl_lahir', $data->tgl_lahir, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('token','Token') }}
    {{ Form::text('token', $data->token, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop