<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;

use Mobilocator\Http\Requests;
use Mobilocator\Http\Requests\validasiProsesLogin;
use Auth;
use DB;
use Input;
use Redirect;
use Pemiliks;

class MainController extends Controller
{
    public function homeAdmin ()
	{
		if (Auth::user())
		{
			if (Auth::user()->level == 'Admin')
			{
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
								->get(1);
				$data_tunggu2 = DB::table('usahas')
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
								->get(1);
				return view('home_admin')->with('data_tunggu',$data_tunggu)->with('data_tunggu2',$data_tunggu2);
			}
			else if (Auth::user()->level == 'SuperAdmin')
			{
				return Redirect::to('superadmin');
			}
		}
		else 
		{
			return Redirect::to('admin/login')->with('message','Anda tidak memiliki hak akses');
		}
	}
	public function loginAdmin()
	{
		if (Auth::user())
		{
			return Redirect::to(URL('admin'));
		}
		else 
		{
			return view('admin_login');
		}
	}
	public function logoutAdmin()
	{
		Auth::logout();
		return Redirect::to('admin/login')->with('message','berhasil logout');
	}
	public function prosesLoginAdmin(validasiProsesLogin $validasi)
	{
		if (Auth::attempt(['username' => Input::get('username'), 'password' => Input::get('password')])) 
		{
			return Redirect::to(URL('admin'));
		}
		else 
		{
			return Redirect::to('admin/login')->with('message','salah username atau salah password');
		}
	}
	public function homeSAdmin ()
	{
		if (Auth::user())
		{
			if (Auth::user()->level == 'SuperAdmin')
			{
				return view('home_sadmin');
			}
			else 
			{
				return Redirect::to('admin/login')->with('message','Anda tidak memiliki hak akses');
			}
		}
		else 
		{
			return Redirect::to('admin/login')->with('message','Anda tidak memiliki hak akses');
		}
	}
}
