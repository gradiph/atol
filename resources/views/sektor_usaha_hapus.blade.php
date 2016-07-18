@extends('template.t_index')
@section('title') Hapus Sektor | @stop
@section('content')
<div class="container">
    <h2><b>HAPUS SEKTOR</b></h2>
    {{ Form::open(['url' => URL('admin/sektor-usaha/$sektor->id/hapus/proses')]) }}
    {{ Form::hidden('id',$sektor->id) }}
    {{ Form::label('nama','Nama Sektor') }}
    {{ Form::text('nama', $sektor->nama, ['class' => 'form-control','readonly' => 'readonly']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop