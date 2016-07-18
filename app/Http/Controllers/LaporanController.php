<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;

use Mobilocator\Http\Requests;
use DB;
use Input;
use Redirect;
use Excel;

class LaporanController extends Controller
{
    public function home()
	{
		return view('laporan_home');
	}
    public function lihat()
	{
		$data = DB::table('usahas')
					->join('pemiliks', 'usahas.id_pemilik', '=','pemiliks.id')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->join('skalas', 'usahas.id_skala', '=','skalas.id')
					->join('sektors', 'usahas.id_sektor', '=','sektors.id')
					->join('kelurahans', 'usahas.id_kel', '=','kelurahans.id')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('usahas.id as id',
							'pemiliks.id as idPemilik',
							'users.id as idUsers',
							'users.nama as namaUsers',
							'usahas.nama as namaUsaha',
							'usahas.alamat as alamat',
							'usahas.lat as lat',
							'usahas.lng as lng',
							'usahas.telepon as telepon',
							'usahas.produk_unggulan as produk_unggulan',
							'usahas.deskripsi as deskripsi',
							'usahas.gambar_foto as gambar_foto',
							'sektors.nama as sektor',
							'skalas.nama as skala',
							'kecamatans.nama as namaKec',
							'kelurahans.nama as namaKel',
							'usahas.status as status')
					->orderBy('usahas.status', 'asc')
					->orderBy('usahas.nama', 'asc')
					->paginate(25);
		return view('laporan_lihat')->with('data',$data);
	}
    public function export()
	{
		$data = DB::table('usahas')
					->join('pemiliks', 'usahas.id_pemilik', '=','pemiliks.id')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->join('skalas', 'usahas.id_skala', '=','skalas.id')
					->join('sektors', 'usahas.id_sektor', '=','sektors.id')
					->join('kelurahans', 'usahas.id_kel', '=','kelurahans.id')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('usahas.id as id',
							'pemiliks.id as idPemilik',
							'users.id as idUsers',
							'users.nama as namaUsers',
							'usahas.nama as namaUsaha',
							'usahas.alamat as alamat',
							'usahas.lat as lat',
							'usahas.lng as lng',
							'usahas.telepon as telepon',
							'usahas.produk_unggulan as produk_unggulan',
							'usahas.deskripsi as deskripsi',
							'usahas.gambar_foto as gambar_foto',
							'sektors.nama as sektor',
							'skalas.nama as skala',
							'kecamatans.nama as namaKec',
							'kelurahans.nama as namaKel',
							'usahas.status as status')
					->orderBy('usahas.status', 'asc')
					->orderBy('usahas.nama', 'asc')
					->get();
		
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
		Excel::create(Input::get('nama'), function($excel) use($tabel) {
			$excel->sheet('Sheet', function($sheet) use($tabel) {
				$sheet->setAutoSize(true);
				$sheet->with($tabel);
			});
		})->download('xlsx');
		
		return Redirect::to('admin/laporan')->with('message','File telah disimpan dengan nama '.Input::get('nama').'.xls');
	}
}
