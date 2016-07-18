@extends('template.t_index')
@section('title') Data Wilayah | @stop
@section('content')
<style>
ul.kec {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}
ul.kec li { float:left; margin-right:7px; }
</style>
<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <h2><b>DAFTAR KECAMATAN</b></h2>
    <table border="0">
    	<tr>
        	<td>
                <ul class="kec">
                    @foreach($kec as $dat)
                        <li style="font-size:16px;"><a href="#{{ $dat->nama }}">{{ $dat->nama }}</a></li>
                    @endforeach
                </ul>
    		</td>
        	<td><button class="btn-primary img-rounded" style="padding:5px 15px;" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan/baru') }}';">Tambah<br /> Baru</button></td>
        </tr>
    </table>
    <p></p>
    <p align="right">
    	<button class="btn-default img-rounded" disabled="disabled"><span class="glyphicon glyphicon-plus"></span></button> tambah kelurahan &nbsp;&nbsp;
    	<button class="btn-default img-rounded" disabled="disabled"><span class="glyphicon glyphicon-edit"></span></button> ubah &nbsp;&nbsp;
        <button class="btn-default img-rounded" disabled="disabled"><span class="glyphicon glyphicon-trash"></span></button> hapus</p>
    <p></p>
	<div class="row text-center">
    	@foreach($kec as $dat_kec)
        	<?php $i = 1; ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a name="{{ $dat_kec->nama }}"></a>
                <div class="panel panel-info">
                    <div class="panel-heading" id="panel{{ $dat_kec->id }}">
                        <span style="margin-left:20%;">
                        	<strong>{{ $dat_kec->nama }}</strong>
                        </span>
                        <span style="float:right; margin-top:-4px;">
                        	<button class="btn-default img-rounded" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan') }}/' + {{ $dat_kec->id }} + '/kelurahan/baru';"><span class="glyphicon glyphicon-plus"></span></button>
                            <button class="btn-default img-rounded" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan') }}/' + {{ $dat_kec->id }} + '/ubah';"><span class="glyphicon glyphicon-edit"></span></button> 
                        	<button class="btn-default img-rounded" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan') }}/' + {{ $dat_kec->id }} + '/hapus';"><span class="glyphicon glyphicon-trash"></span></button>
                        </span>
                    </div>
                    <div class="panel-body" id="isi1">
                    	<div class="table-responsive" style="height:300px;">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center" colspan="2">Kelurahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kel as $dat_kel)
                                        @if($dat_kel->idKec == $dat_kec->id)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td class="text-left">
                                                    {{ $dat_kel->namaKel }}
                                                </td>
                                                <td>
                                                    <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan') }}/' + {{ $dat_kel->idKec }} + '/kelurahan/{{ $dat_kel->idKel }}/ubah';" title="ubah"><span class="glyphicon glyphicon-edit"></span></button> 
                                                    <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/wilayah/kecamatan') }}/' + {{ $dat_kel->idKec }} + '/kelurahan/{{ $dat_kel->idKel }}/hapus';" title="hapus"><span class="glyphicon glyphicon-trash"></span></button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@stop