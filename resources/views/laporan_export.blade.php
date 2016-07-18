@extends('template.t_index')
@section('title') Data Usaha | @stop
@section('content')
<div class="container">
    <h2>Download Laporan Data Usaha</h2>
    <p>File disimpan dengan nama {{ $nama }}</p>
    <?php
	$tabel = [
		['No','Nama Pemilik','Nama Usaha','Alamat','Telepon','Latitude','Longitude','Deskripsi','Produk Unggulan','File Foto','Skala','Sektor','Kelurahan','Kecamatan','Status']
	];
	$no = 1;
	foreach($data as $dat)
	{
		array_push($tabel,[
			$no++,$dat->namaUsers,$dat->namaUsaha,$dat->alamat,$dat->telepon,$dat->lat,$dat->lng,$dat->deskripsi,$dat->produk_unggulan,$dat->gambar_foto,$dat->skala,$dat->sektor,$dat->namaKel,$dat->namaKec,$dat->status
		]);
	}
	Excel::create($nama, function($excel) use($tabel) {
		$excel->sheet('Sheet', function($sheet) use($tabel) {
			$sheet->setAutoSize(true);
			$sheet->with($tabel);
		});
	})->download('xls');
	?>
    <button class="btn btn-lg btn-primary" onclick="javascript:history.back()">Kembali</button>
</div>

@stop