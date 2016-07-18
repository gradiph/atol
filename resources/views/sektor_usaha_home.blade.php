@extends('template.t_index')
@section('title') Data Sektor Usaha | @stop
@section('content')
<div class="container">
    @if(Session::has('message'))
        <span id="pesan" class="label label-success">{{ Session::get('message') }}</span>
    @endif
    <h2><b>SEKTOR USAHA</b></h2>
    <button class="btn-primary img-rounded" style="padding:5px 15px;" onclick="window.location.href = '{{ URL('admin/sektor-usaha/baru') }}';">Tambah Baru</button>
    <p></p>
    <div class="row text-center">
    	<div class="col-lg-7 col-md-9 col-sm-10 col-xs-12">
        	{!! $sektor->render() !!}
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center" colspan="2">Sektor</th>
                    </tr>
                </thead>
                <tbody>
        			<?php $i = $sektor->currentPage() * 25 - 24; ?>
                    @foreach($sektor as $dat_sektor)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="text-left">
                                {{ $dat_sektor->nama }}
                            </td>
                            <td>
                                <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/sektor-usaha') }}/' + {{ $dat_sektor->id }} + '/ubah';" title="ubah"><span class="glyphicon glyphicon-edit"></span></button> 
                                <button class="btn-default btn-xs img-rounded" onclick="window.location.href = '{{ URL('admin/sektor-usaha') }}/' + {{ $dat_sektor->id }} + '/hapus';" title="hapus"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        	{!! $sektor->render() !!}
        </div>
    </div>
</div>

@stop