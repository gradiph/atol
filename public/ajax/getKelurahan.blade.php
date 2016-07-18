<?php
use DB;
$idKec = $_GET['idKec'];
$data = DB::table("kelurahan")
			->where('id_kecamatan','=','$idKec')
			->get();
?>
    {{ Form::label('idKec','Kecamatan') }}
    <select name="idKec" class="form-control" id="kec">
    	@foreach($data as $dat_kec)
        	@if($dat_kec->id == $data->idKec)
            	<option value="{{ $dat_kec->id }}" selected="selected">{{ $dat_kec->nama }}</option>
            @else
    			<option value="{{ $dat_kec->id }}">{{ $dat_kec->nama }}</option>
            @endif
        @endforeach
    </select>