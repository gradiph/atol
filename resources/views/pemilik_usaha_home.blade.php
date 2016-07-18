@extends('template.t_index')
@section('title') Data Pemilik Usaha | @stop
@section('content')<script>
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
	<h2>Aktivasi Akun Baru</h2>
    <div id="accordion1">
    	@foreach($data_tunggu as $dat_tunggu)
            <h2>{{ $dat_tunggu->nama }}</h2>
            <div class="row" style="height:300px; width:100%;">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <figure>
                        <img class="img-responsive" src="{{ asset('gambar/ktp/'. $dat_tunggu->gambar_ktp) }}" alt="{{ $dat_tunggu->gambar_ktp }}" />
                    </figure>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                    <span style="float:left; width:50%; padding:0px 20px; ">
                        <p>Nama : {{ $dat_tunggu->nama }}</p>
                        <p>Email : {{ $dat_tunggu->email }}</p>
                        <p>TTL : {{ $dat_tunggu->tempat_lahir }}, {{ $dat_tunggu->tgl_lahir }}</p>
                        <p>Alamat : {{ $dat_tunggu->alamat }}</p>
                    </span>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <button class="btn btn-block btn-primary" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat_tunggu->id }} + '/aktifkan';">Aktifkan</button>
                    <br />
                    <button class="btn btn-block btn-danger" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat_tunggu->id }} + '/non-aktifkan';">Non-Aktifkan</button>
                </div>
            </div>
        @endforeach
    </div>
    <h2>Pengolahan Data Akun</h2>
    <center>{!! $data->render() !!}</center>
    <table class="table table-responsive table-hover table-bordered table-striped">
    	<thead>
        	<tr>
            	<th>No</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No KTP</th>
                <th>File KTP</th>
                <th>Status</th>
                <th>Token</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        	<?php $i = $data->currentPage() * 25 - 24; ?>
        	@foreach($data as $dat)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dat->nama }}</td>
                    <td>{{ $dat->tempat_lahir }}, {{ $dat->tgl_lahir }}</td>
                    <td>{{ $dat->no_hp }}</td>
                    <td>{{ $dat->email }}</td>
                    <td>{{ $dat->alamat }}</td>
                    <td>{{ $dat->no_ktp }}</td>
                    <td>{{ $dat->gambar_ktp }}</td>
                    <td>{{ $dat->status }}</td>
                    <td>{{ $dat->token }}</td>
                    <td>
                        @if($dat->status == 'Aktif')
                        	<button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat->id }} + '/non-aktifkan';" title="non-aktifkan"><span class="glyphicon glyphicon-remove-circle"></span></button> 
                        @else
                        	<button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat->id }} + '/aktifkan';" title="aktifkan"><span class="glyphicon glyphicon-ok-circle"></span></button> 
                        @endif
                        <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat->id }} + '/ubah';" title="ubah"><span class="glyphicon glyphicon-edit"></span></button> 
                        <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/pemilik-usaha') }}/' + {{ $dat->id }} + '/hapus';" title="hapus"><span class="glyphicon glyphicon-trash"></span></button> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <center>{!! $data->render() !!}</center>
</div>

@stop