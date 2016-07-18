@extends('template.t_index')
@section('title') Laporan | @stop
@section('content')
<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <h2>Laporan Data Usaha</h2>
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <center>{!! $data->render() !!}</center>
    <p></p>
    {{ Form::open(['url' => URL('admin/laporan/export')]) }}
    {{ Form::label('nama','Nama File') }}
    {{ Form::text('nama', '', ['class' => 'form-control-static']) }}
    {{ Form::submit('Download ( .xlsx )', ['class' => 'btn btn-primary btn-lg']) }}
    {{ Form::close() }}
</div>

@stop