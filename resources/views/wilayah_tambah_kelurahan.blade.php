@extends('template.t_index')
@section('title') Tambah Kelurahan | @stop
@section('content')
<div class="container">
    <h2><b>TAMBAH KELURAHAN</b></h2>
    {{ Form::open(['url' => URL('admin/wilayah/kecamatan/$idKec/kelurahan/baru/proses')]) }}
    {{ Form::hidden('id_kec',$id_kec) }}
    {{ Form::label('nama','Nama Kelurahan') }}
    {{ Form::text('nama', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('kecamatan','Kecamatan') }}
    <select name="kecamatan" class="form-control">
    	@foreach($kec as $data_kec)
        	<option value="{{ $data_kec->id }}">{{ $data_kec->nama }}</option>
        @endforeach
    </select>
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop