@extends('template.t_index')
@section('title') Data User | @stop
@section('content')
<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <h2><b>PENGOLAHAN DATA USER</b></h2>
    <button class="btn-primary img-rounded" style="padding:5px 15px;" onclick="window.location.href = '{{ URL('superadmin/user/baru') }}';">Tambah Baru</button>
    <p></p>
    <div class="row text-center">
    	<div class="col-lg-7 col-md-9 col-sm-10 col-xs-12">
        	{!! $data->render() !!}
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
        			<?php $i = $data->currentPage() * 25 - 24; ?>
                    @foreach($data as $dat)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="text-left">{{ $dat->username }}</td>
                            <td class="text-left">{{ $dat->nama }}</td>
                            <td>{{ $dat->email }}</td>
                            <td>{{ $dat->level }}</td>
                            <td>
                                <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('superadmin/user') }}/' + {{ $dat->id }};" title="ubah password"><span class="glyphicon glyphicon-wrench"></span></button> 
                                <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('superadmin/user') }}/' + {{ $dat->id }} + '/ubah';" title="ubah"><span class="glyphicon glyphicon-edit"></span></button> 
                                <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('superadmin/user') }}/' + {{ $dat->id }} + '/hapus';" title="hapus"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        	{!! $data->render() !!}
        </div>
    </div>
</div>

@stop