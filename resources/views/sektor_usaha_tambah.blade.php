@extends('template.t_index')
@section('title') Tambah Sektor | @stop
@section('content')
<div class="container">
    <h2><b>TAMBAH SEKTOR</b></h2>
    {{ Form::open(['url' => URL('admin/sektor-usaha/baru/proses')]) }}
    {{ Form::label('nama','Nama Sektor') }}
    {{ Form::text('nama', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Simpan', ['class' => 'btn btn-primary']) }} <button type="button" class="btn btn-default" onclick="javascript:history.back()">Kembali</button>
    {{ Form::close() }}
</div>

@stop