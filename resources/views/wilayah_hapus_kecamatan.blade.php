@extends('template.t_index')
@section('title') Hapus Kecamatan | @stop
@section('content')
<div class="container">
    <h2><b>HAPUS KECAMATAN</b></h2>
    {{ Form::open(['url' => URL('admin/wilayah/kecamatan/$kec->id/hapus/proses')]) }}
    {{ Form::hidden('id',$kec->id) }}
    {{ Form::label('nama','Nama Kecamatan') }}
    {{ Form::text('nama', $kec->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::label('kode_pos','Kode Pos') }}
    {{ Form::text('kode_pos', $kec->kode_pos, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop