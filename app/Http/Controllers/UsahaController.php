<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Input;
use Redirect;

class UsahaController extends Controller
{
    public function home()
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
					->where('usahas.status','!=','Menunggu')
					->orderBy('usahas.status', 'asc')
					->orderBy('usahas.nama', 'asc')
					->paginate(25);
		$data_tunggu = DB::table('usahas')
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
					->where('usahas.status','=','Menunggu')
					->orderBy('usahas.status', 'asc')
					->orderBy('usahas.nama', 'asc')
					->get(5);
		return view('usaha_home')->with('data',$data)
								->with('data_tunggu',$data_tunggu);
	}
	public function aktifkan($id)
	{
		$nama = DB::table('usahas')
					->where('id','=',$id)
					->first();
		$data = [
			'status' => 'Aktif'
		];
		DB::table('usahas')
					->where('id','=',$id)
					->update($data);
		return Redirect::to('admin/data-usaha')->with('message','Berhasil mengaktifkan usaha ' . $nama->nama);
	}
	public function nonAktifkan($id)
	{
		$nama = DB::table('usahas')
					->where('id','=',$id)
					->first();
		$data = [
			'status' => 'Non-Aktif'
		];
		DB::table('usahas')
					->where('id','=',$id)
					->update($data);
		return Redirect::to('admin/data-usaha')->with('message','Berhasil menon-aktifkan usaha ' . $nama->nama);
	}
	public function ubah($id)
	{
		$users = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as idPemiliks',
							'users.id as idUsers',
							'users.nama as nama')
					->orderBy('users.nama','asc')
					->get();
		$sektor = DB::table('sektors')
					->orderBy('nama','asc')
					->get();
		$skala = DB::table('skalas')
					->orderBy('nama','asc')
					->get();
		$kelurahans = DB::table('kelurahans')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('kelurahans.id as idKel',
							'kecamatans.id as idKec',
							'kelurahans.nama as namaKel',
							'kecamatans.nama as namaKec')
					->orderBy('kecamatans.nama','asc')
					->orderBy('kelurahans.nama','asc')
					->get();
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
							'usahas.id_skala as idSkala',
							'usahas.id_sektor as idSektor',
							'usahas.id_kel as idKel',
							'kelurahans.id_kec as idKec',
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
					->where('usahas.id','=',$id)
					->first();
		return view('usaha_ubah')->with('data',$data)
								->with('users',$users)
								->with('sektor',$sektor)
								->with('skala',$skala)
								->with('kelurahan',$kelurahans);
	}
	public function prosesUbah($id)
	{
		$data = [
			'id_pemilik' => Input::get('idUsers'),
			'nama' => Input::get('namaUsaha'),
			'alamat' => Input::get('alamat'),
			'telepon' => Input::get('telepon'),
			'lat' => Input::get('lat'),
			'lng' => Input::get('lng'),
			'deskripsi' => Input::get('deskripsi'),
			'produk_unggulan' => Input::get('produk_unggulan'),
			'gambar_foto' => Input::get('gambar_foto'),
			'id_skala' => Input::get('idSkala'),
			'id_sektor' => Input::get('idSektor'),
			'id_kel' => Input::get('idKel'),
		];
		DB::table('usahas')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/data-usaha')->with('message','Berhasil mengubah akun ' . Input::get('namaUsaha'));
	}
	public function hapus($id)
	{
		$users = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as idPemiliks',
							'users.id as idUsers',
							'users.nama as nama')
					->orderBy('users.nama','asc')
					->get();
		$sektor = DB::table('sektors')
					->orderBy('nama','asc')
					->get();
		$skala = DB::table('skalas')
					->orderBy('nama','asc')
					->get();
		$kelurahans = DB::table('kelurahans')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('kelurahans.id as idKel',
							'kecamatans.id as idKec',
							'kelurahans.nama as namaKel',
							'kecamatans.nama as namaKec')
					->orderBy('kecamatans.nama','asc')
					->orderBy('kelurahans.nama','asc')
					->get();
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
							'usahas.id_skala as idSkala',
							'usahas.id_sektor as idSektor',
							'usahas.id_kel as idKel',
							'kelurahans.id_kec as idKec',
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
					->where('usahas.id','=',$id)
					->first();
		return view('usaha_hapus')->with('data',$data)
								->with('users',$users)
								->with('sektor',$sektor)
								->with('skala',$skala)
								->with('kelurahan',$kelurahans);
	}
	public function prosesHapus()
	{
		DB::table('usahas')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/data-usaha')->with('message','Berhasil menghapus akun ' . Input::get('nama'));
	}
}
