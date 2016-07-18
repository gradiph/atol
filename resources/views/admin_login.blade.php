@extends('template.t_index')
@section('title') Masuk | @stop
@section('content')

<div class="container">
    <div class="panel panel-default" style="width:40%; margin-left:auto; margin-right:auto; margin-top:14%;">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span> Login
            @if(Session::has('message'))
                <span class="label label-danger">{{ Session::get('message') }}</span>
            @endif
        </div>
        <div class="panel-body">
            {{ Form::open(['url' => URL('admin/processLogin')]) }}
            Username: 
            @if($errors->has())
                <span class="label label-danger">{{ $errors->first('username') }}</span>
            @endif
            {{ Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'NIP','autofocus' => 'autofocus']) }}
            Password:
            @if($errors->has())
                <span class="label label-danger">{{ $errors->first('password') }}</span>
            @endif
            {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            <p></p>
            {{ Form::submit('Login', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop