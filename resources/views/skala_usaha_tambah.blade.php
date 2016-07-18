@extends('template.t_index')
@section('title') Tambah Skala | @stop
@section('content')
<div class="container">
    <h2><b>TAMBAH SKALA</b></h2>
    {{ Form::open(['url' => URL('admin/skala-usaha/baru/proses')]) }}
    {{ Form::label('nama','Nama Skala') }}
    {{ Form::text('nama', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop