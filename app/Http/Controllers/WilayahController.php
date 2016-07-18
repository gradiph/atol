<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Input;
use Redirect;

class WilayahController extends Controller
{
    public function home()
	{
		$data_kec = DB::table('kecamatans')
					->orderBy('nama', 'asc')
					->get();
		$data_kel = DB::table('kelurahans')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('kelurahans.id as idKel',
							'kelurahans.nama as namaKel',
							'kecamatans.id as idKec',
							'kecamatans.nama as namaKec')
					->orderBy('namaKec', 'asc')
					->orderBy('namaKel', 'asc')
					->get();
		return view('wilayah_home')->with('kel',$data_kel)
									->with('kec',$data_kec);
	}
	public function tambahKecamatan()
	{
		return view('wilayah_tambah_kecamatan');
	}
	public function prosesTambahKecamatan()
	{
		$data = [
			'nama' => Input::get('nama'),
			'kode_pos' => Input::get('kode_pos')
		];
		DB::table('kecamatans')->insertGetId($data);
		return Redirect::to('admin/wilayah')->with('message','Berhasil menambah kecamatan ' . Input::get('nama'));
	}
	public function ubahKecamatan($id)
	{
		$data_kec = DB::table('kecamatans')
					->where('id','=',$id)
					->first();
		return view('wilayah_ubah_kecamatan')->with('kec',$data_kec);
	}
	public function prosesUbahKecamatan($id)
	{
		$data = [
			'nama' => Input::get('nama'),
			'kode_pos' => Input::get('kode_pos')
		];
		DB::table('kecamatans')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/wilayah')->with('message','Berhasil mengubah kecamatan ' . Input::get('nama'));
	}
	public function hapusKecamatan($id)
	{
		$data_kec = DB::table('kecamatans')
					->where('id','=',$id)
					->first();
		return view('wilayah_hapus_kecamatan')->with('kec',$data_kec);
	}
	public function prosesHapusKecamatan()
	{
		DB::table('kecamatans')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/wilayah')->with('message','Berhasil menghapus kecamatan ' . Input::get('nama'));
	}
	public function tambahKelurahan($id_kec)
	{
		$data_kec = DB::table('kecamatans')
					->orderBy('nama', 'asc')
					->get();
		return view('wilayah_tambah_kelurahan')->with('kec',$data_kec)->with('id_kec',$id_kec);
	}
	public function prosesTambahKelurahan()
	{
		$data = [
			'nama' => Input::get('nama'),
			'id_kec' => Input::get('kecamatan')
		];
		DB::table('kelurahans')->insertGetId($data);
		return Redirect::to('admin/wilayah')->with('message','Berhasil menambah kelurahan ' . Input::get('nama'));
	}
	public function ubahKelurahan($id_kec,$id_kel)
	{
		$data_kec = DB::table('kecamatans')
					->orderBy('nama', 'asc')
					->get();
		$data_kel = DB::table('kelurahans')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('kelurahans.id as idKel',
							'kelurahans.nama as namaKel',
							'kecamatans.id as idKec',
							'kecamatans.nama as namaKec')
					->where('kelurahans.id','=',$id_kel)
					->first();
		return view('wilayah_ubah_kelurahan')->with('kel',$data_kel)
											->with('kec',$data_kec);
	}
	public function prosesUbahKelurahan($id)
	{
		$data = [
			'nama' => Input::get('nama'),
			'id_kec' => Input::get('kecamatan')
		];
		DB::table('kelurahans')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/wilayah')->with('message','Berhasil mengubah kelurahan ' . Input::get('nama'));
	}
	public function hapusKelurahan($id_kec,$id_kel)
	{
		$data_kec = DB::table('kecamatans')
					->orderBy('nama', 'asc')
					->get();
		$data_kel = DB::table('kelurahans')
					->join('kecamatans', 'kelurahans.id_kec', '=','kecamatans.id')
					->select('kelurahans.id as idKel',
							'kelurahans.nama as namaKel',
							'kecamatans.id as idKec',
							'kecamatans.nama as namaKec')
					->where('kelurahans.id','=',$id_kel)
					->first();
		return view('wilayah_hapus_kelurahan')->with('kel',$data_kel)
											->with('kec',$data_kec);
	}
	public function prosesHapusKelurahan()
	{
		DB::table('kelurahans')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/wilayah')->with('message','Berhasil menghapus kelurahan ' . Input::get('nama'));
	}
}
