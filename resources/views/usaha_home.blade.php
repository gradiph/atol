@extends('template.t_index')
@section('title') Data Usaha | @stop
@section('content')
<script>
$(document).ready(function(e) {
    $("#accordion1").accordion({
		heightStyle: "content",
		event:"mouseover"
	});
});
</script>
<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
	<h2>Aktivasi Usaha Baru</h2>
    <div id="accordion1">
    	@foreach($data_tunggu as $dat_tunggu)
            <h2>{{ $dat_tunggu->namaUsaha }}</h2>
            <div class="row" style="height:300px; width:100%;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <img class="img-responsive" src="{{ asset('gambar/foto/'.$dat_tunggu->gambar_foto) }}" alt="{{ $dat_tunggu->gambar_foto }}" />
                    </figure>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <span style="float:left; width:50%; padding:0px 20px; ">
                        <p>Pemilik : {{ $dat_tunggu->namaUsers }}</p>
                        <p>Nama Usaha : {{ $dat_tunggu->namaUsaha }}</p>
                        <p>Alamat : {{ $dat_tunggu->alamat }}</p>
                        <p>Telepon : {{ $dat_tunggu->telepon }}</p>
                        <p>Lat, Lng : {{ $dat_tunggu->lat }}, {{ $dat_tunggu->lng }}</p>
                        <p>Produk Unggulan : {{ $dat_tunggu->produk_unggulan }}</p>
                    </span>
                    <span style="float:left; width:50%; padding:0px 20px; ">
                        <p>Deskripsi : {{ $dat_tunggu->deskripsi }}</p>
                        <p>Skala : {{ $dat_tunggu->skala }}</p>
                        <p>Sektor : {{ $dat_tunggu->sektor }}</p>
                        <p>Kecamatan : {{ $dat_tunggu->namaKec }}</p>
                        <p>Kelurahan : {{ $dat_tunggu->namaKel }}</p>
                    </span>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <button class="btn btn-block btn-primary" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat_tunggu->id }} + '/aktifkan';">Aktifkan</button>
                    <br />
                    <button class="btn btn-block btn-danger" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat_tunggu->id }} + '/non-aktifkan';">Non-Aktifkan</button>
                </div>
            </div>
        @endforeach
    </div>
    <h2>Pengolahan Data Usaha</h2>
    <center>{!! $data->render() !!}</center>
    <table class="table table-responsive table-hover table-bordered table-striped">
    	<thead>
        	<tr>
            	<th>No</th>
                <th>Nama Pemilik</th>
                <th>Nama Usaha</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Latitude, Longitude</th>
                <th>Deskripsi</th>
                <th>Produk Unggulan</th>
                <th>File Foto</th>
                <th>Skala</th>
                <th>Sektor</th>
                <th>Kelurahan, Kecamatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	<?php $i = $data->currentPage() * 25 - 24; ?>
        	@foreach($data as $dat)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dat->namaUsers }}</td>
                    <td>{{ $dat->namaUsaha }}</td>
                    <td>{{ $dat->alamat }}</td>
                    <td>{{ $dat->telepon }}</td>
                    <td>{{ $dat->lat }}, {{ $dat->lng }}</td>
                    <td>{{ $dat->deskripsi }}</td>
                    <td>{{ $dat->produk_unggulan }}</td>
                    <td>{{ $dat->gambar_foto }}</td>
                    <td>{{ $dat->skala }}</td>
                    <td>{{ $dat->sektor }}</td>
                    <td>{{ $dat->namaKel }}, {{ $dat->namaKec }}</td>
                    <td>{{ $dat->status }}</td>
                    <td>
                        @if($dat->status == 'Aktif')
                        	<button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat->id }} + '/non-aktifkan';" title="non-aktifkan"><span class="glyphicon glyphicon-remove-circle"></span></button> 
                        @else
                        	<button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat->id }} + '/aktifkan';" title="aktifkan"><span class="glyphicon glyphicon-ok-circle"></span></button> 
                        @endif
                        <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat->id }} + '/ubah';" title="ubah"><span class="glyphicon glyphicon-edit"></span></button> 
                        <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/data-usaha') }}/' + {{ $dat->id }} + '/hapus';" title="hapus"><span class="glyphicon glyphicon-trash"></span></button> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <center>{!! $data->render() !!}</center>
</div>

@stop