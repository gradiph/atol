@extends('template.t_index')
@section('title') Tambah Kecamatan | @stop
@section('content')
<div class="container">
    <h2><b>TAMBAH KECAMATAN</b></h2>
    {{ Form::open(['url' => URL('admin/wilayah/kecamatan/baru/proses')]) }}
    {{ Form::label('nama','Nama Kecamatan') }}
    {{ Form::text('nama', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('kode_pos','Kode Pos') }}
    {{ Form::text('kode_pos', '', ['class' => 'form-control','maxlength' => '5']) }}
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop