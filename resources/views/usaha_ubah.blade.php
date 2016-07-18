@extends('template.t_index')
@section('title') Ubah Data Usaha | @stop
@section('content')

<div class="container">
    <h2><b>UBAH DATA USAHA</b></h2>
    {{ Form::open(['url' => URL('admin/data-usaha/$data->id/ubah/proses')]) }}
    {{ Form::hidden('id',$data->id) }}
    {{ Form::label('idUsers','Nama Pemilik') }}
    <select name="idUsers" class="form-control">
    	@foreach($users as $dat_users)
        	@if($dat_users->idUsers == $data->idUsers)
            	<option value="{{ $dat_users->idPemiliks }}" selected="selected">{{ $dat_users->nama }}</option>
            @else
    			<option value="{{ $dat_users->idPemiliks }}">{{ $dat_users->nama }}</option>
            @endif
        @endforeach
    </select>
    <p></p>
    {{ Form::label('namaUsaha','Nama Usaha') }}
    {{ Form::text('namaUsaha', $data->namaUsaha, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('alamat','Alamat') }}
    {{ Form::text('alamat', $data->alamat, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('telepon','Telepon') }}
    {{ Form::text('telepon', $data->telepon, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('lat','Latitude') }}
    {{ Form::text('lat', $data->lat, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('lng','Longitude') }}
    {{ Form::text('lng', $data->lng, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('deskripsi','Deskripsi') }}
    {{ Form::text('deskripsi', $data->deskripsi, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('produk_unggulan','Produk Unggulan') }}
    {{ Form::text('produk_unggulan', $data->produk_unggulan, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('gambar_foto','File Foto') }}
    {{ Form::text('gambar_foto', $data->gambar_foto, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('idSkala','Skala') }}
    <select name="idSkala" class="form-control">
    	@foreach($skala as $dat_skala)
        	@if($dat_skala->id == $data->idSkala)
            	<option value="{{ $dat_skala->id }}" selected="selected">{{ $dat_skala->nama }}</option>
            @else
    			<option value="{{ $dat_skala->id }}">{{ $dat_skala->nama }}</option>
            @endif
        @endforeach
    </select>
    <p></p>
    {{ Form::label('idSektor','Sektor') }}
    <select name="idSektor" class="form-control">
    	@foreach($sektor as $dat_sektor)
        	@if($dat_sektor->id == $data->idSektor)
            	<option value="{{ $dat_sektor->id }}" selected="selected">{{ $dat_sektor->nama }}</option>
            @else
    			<option value="{{ $dat_sektor->id }}">{{ $dat_sektor->nama }}</option>
            @endif
        @endforeach
    </select>
    <p></p>
    {{ Form::label('idKel','Wilayah (Kelurahan, Kecamatan)') }}
    <select name="idKel" class="form-control" id="kec" onchange="showKel(this.value)">
    	@foreach($kelurahan as $dat_kel)
        	@if($dat_kel->idKel == $data->idKel)
            	<option value="{{ $dat_kel->idKel }}" selected="selected">{{ $dat_kel->namaKel }}, {{ $dat_kel->namaKec }}</option>
            @else
    			<option value="{{ $dat_kel->idKel }}">{{ $dat_kel->namaKel }}, {{ $dat_kel->namaKec }}</option>
            @endif
        @endforeach
    </select>
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop