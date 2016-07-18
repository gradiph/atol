@extends('template.t_index')
@section('title') Ubah Kelurahan | @stop
@section('content')
<div class="container">
    <h2><b>UBAH KELURAHAN</b></h2>
    {{ Form::open(['url' => URL('admin/wilayah/kecamatan/$kel->idKec/kelurahan/$kel->idKel/ubah/proses')]) }}
    {{ Form::hidden('id',$kel->idKel) }}
    {{ Form::label('nama','Nama Kelurahan') }}
    {{ Form::text('nama', $kel->namaKel, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('kecamatan','Kecamatan') }}
    <select name="kecamatan" class="form-control">
    	@foreach($kec as $data_kec)
        	@if($data_kec->id == $kel->idKec)
            	<option value="{{ $data_kec->id }}" selected="selected">{{ $data_kec->nama }}</option>
            @else
            	<option value="{{ $data_kec->id }}">{{ $data_kec->nama }}</option>
            @endif
        @endforeach
    </select>
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop