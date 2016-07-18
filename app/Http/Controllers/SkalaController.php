<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Redirect;
use Input;

class SkalaController extends Controller
{
    public function home()
	{
		$data = DB::table('skalas')
					->orderBy('nama', 'asc')
					->paginate(25);
		return view('skala_usaha_home')->with('skala',$data);
	}
	public function tambahSkala()
	{
		return view('skala_usaha_tambah');
	}
	public function prosesTambahSkala()
	{
		$data = [
			'nama' => Input::get('nama')
		];
		DB::table('skalas')->insertGetId($data);
		return Redirect::to('admin/skala-usaha')->with('message','Berhasil menambah skala usaha ' . Input::get('nama'));
	}
	public function ubahSkala($id)
	{
		$data = DB::table('skalas')
					->where('id','=',$id)
					->first();
		return view('skala_usaha_ubah')->with('skala',$data);
	}
	public function prosesUbahSkala($id)
	{
		$data = [
			'nama' => Input::get('nama')
		];
		DB::table('skalas')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/skala-usaha')->with('message','Berhasil mengubah skala usaha ' . Input::get('nama'));
	}
	public function hapusSkala($id)
	{
		$data = DB::table('skalas')
					->where('id','=',$id)
					->first();
		return view('skala_usaha_hapus')->with('skala',$data);
	}
	public function prosesHapusSkala()
	{
		DB::table('skalas')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/skala-usaha')->with('message','Berhasil menghapus skala usaha ' . Input::get('nama'));
	}
}
