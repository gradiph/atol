@extends('template.t_index')
@section('title') Ubah Skala | @stop
@section('content')
<div class="container">
    <h2><b>UBAH SKALA</b></h2>
    {{ Form::open(['url' => URL('admin/skala-usaha/$sektor->id/ubah/proses')]) }}
    {{ Form::hidden('id',$skala->id) }}
    {{ Form::label('nama','Nama Skala') }}
    {{ Form::text('nama', $skala->nama, ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Hapus', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop