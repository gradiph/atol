@extends('template.t_index')
@section('title') Hapus Skala | @stop
@section('content')
<div class="container">
    <h2><b>HAPUS SKALA</b></h2>
    {{ Form::open(['url' => URL('admin/skala-usaha/$skala->id/hapus/proses')]) }}
    {{ Form::hidden('id',$skala->id) }}
    {{ Form::label('nama','Nama Skala') }}
    {{ Form::text('nama', $skala->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop