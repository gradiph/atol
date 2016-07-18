@extends('template.t_index')
@section('title') Data Laporan | @stop
@section('content')

<div class="container">
    <h2>Laporan</h2>
    {{ Form::open(['url' => URL('admin/laporan/lihat')]) }}
    {{ Form::label('status','Status') }}
    {{ Form::select('status', ['Aktif','Menunggu','Non-Aktif'],'',['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('email','Email') }}
    {{ Form::text('email', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('no_ktp','No KTP') }}
    {{ Form::text('no_ktp', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::label('gambar_ktp','File KTP') }}
    {{ Form::text('gambar_ktp', '', ['class' => 'form-control']) }}
    <p></p>
    {{ Form::submit('Lihat', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
</div>

@stop