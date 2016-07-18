<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Input;
use Redirect;

class PemilikController extends Controller
{
    public function home()
	{
		$data = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as id',
							'users.id as idUsers',
							'users.nama as nama',
							'users.email as email',
							'pemiliks.no_ktp as no_ktp',
							'pemiliks.no_hp as no_hp',
							'pemiliks.alamat as alamat',
							'pemiliks.tempat_lahir as tempat_lahir',
							'pemiliks.tgl_lahir as tgl_lahir',
							'pemiliks.gambar_ktp as gambar_ktp',
							'pemiliks.token as token',
							'pemiliks.status as status')
					->where('pemiliks.status','!=','Menunggu')
					->orderBy('users.nama', 'asc')
					->orderBy('pemiliks.status', 'asc')
					->paginate(25);
		$data_tunggu = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as id',
							'users.id as idUsers',
							'users.nama as nama',
							'users.email as email',
							'pemiliks.no_ktp as no_ktp',
							'pemiliks.no_hp as no_hp',
							'pemiliks.alamat as alamat',
							'pemiliks.tempat_lahir as tempat_lahir',
							'pemiliks.tgl_lahir as tgl_lahir',
							'pemiliks.gambar_ktp as gambar_ktp',
							'pemiliks.token as token',
							'pemiliks.status as status')
					->where('pemiliks.status','=','Menunggu')
					->orderBy('users.nama', 'asc')
					->get(5);
		return view('pemilik_usaha_home')->with('data',$data)
										->with('data_tunggu',$data_tunggu);
	}
	public function aktifkan($id)
	{
		$nama = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('users.nama as nama')
					->where('pemiliks.id','=',$id)
					->first();
		$data = [
			'status' => 'Aktif'
		];
		DB::table('pemiliks')
					->where('id','=',$id)
					->update($data);
		return Redirect::to('admin/pemilik-usaha')->with('message','Berhasil mengaktifkan akun ' . $nama->nama);
	}
	public function nonAktifkan($id)
	{
		$nama = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('users.nama as nama')
					->where('pemiliks.id','=',$id)
					->first();
		$data = [
			'status' => 'Non-Aktif'
		];
		DB::table('pemiliks')
					->where('id','=',$id)
					->update($data);
		return Redirect::to('admin/pemilik-usaha')->with('message','Berhasil menon-aktifkan akun ' . $nama->nama);
	}
	public function ubah($id)
	{
		$data = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as id',
							'users.id as idUsers',
							'users.nama as nama',
							'users.email as email',
							'pemiliks.no_ktp as no_ktp',
							'pemiliks.no_hp as no_hp',
							'pemiliks.alamat as alamat',
							'pemiliks.tempat_lahir as tempat_lahir',
							'pemiliks.tgl_lahir as tgl_lahir',
							'pemiliks.gambar_ktp as gambar_ktp',
							'pemiliks.token as token',
							'pemiliks.status as status')
					->where('pemiliks.id','=',$id)
					->first();
		return view('pemilik_usaha_ubah')->with('data',$data);
	}
	public function prosesUbah($id)
	{
		$data = [
			'nama' => Input::get('nama'),
			'email' => Input::get('email')
		];
		DB::table('users')->where('id','=',Input::get('idUsers'))->update($data);
		$data = [
			'no_ktp' => Input::get('no_ktp'),
			'no_hp' => Input::get('no_hp'),
			'alamat' => Input::get('alamat'),
			'tempat_lahir' => Input::get('tempat_lahir'),
			'tgl_lahir' => Input::get('tgl_lahir'),
			'gambar_ktp' => Input::get('gambar_ktp'),
			'token' => Input::get('token')
		];
		DB::table('pemiliks')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/pemilik-usaha')->with('message','Berhasil mengubah akun ' . Input::get('nama'));
	}
	public function hapus($id)
	{
		$data = DB::table('pemiliks')
					->join('users', 'pemiliks.id_users', '=','users.id')
					->select('pemiliks.id as id',
							'users.id as idUsers',
							'users.nama as nama',
							'users.email as email',
							'pemiliks.no_ktp as no_ktp',
							'pemiliks.no_hp as no_hp',
							'pemiliks.alamat as alamat',
							'pemiliks.tempat_lahir as tempat_lahir',
							'pemiliks.tgl_lahir as tgl_lahir',
							'pemiliks.gambar_ktp as gambar_ktp',
							'pemiliks.token as token',
							'pemiliks.status as status')
					->where('pemiliks.id','=',$id)
					->first();
		return view('pemilik_usaha_hapus')->with('data',$data);
	}
	public function prosesHapus()
	{
		DB::table('pemiliks')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/pemilik-usaha')->with('message','Berhasil menghapus akun ' . Input::get('nama'));
	}
}
