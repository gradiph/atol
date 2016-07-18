<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Redirect;
use Input;

class SektorController extends Controller
{
    public function home()
	{
		$data = DB::table('sektors')
					->orderBy('nama', 'asc')
					->paginate(25);
		return view('sektor_usaha_home')->with('sektor',$data);
	}
	public function tambahSektor()
	{
		return view('sektor_usaha_tambah');
	}
	public function prosesTambahSektor()
	{
		$data = [
			'nama' => Input::get('nama')
		];
		DB::table('sektors')->insertGetId($data);
		return Redirect::to('admin/sektor-usaha')->with('message','Berhasil menambah sektor usaha ' . Input::get('nama'));
	}
	public function ubahSektor($id)
	{
		$data = DB::table('sektors')
					->where('id','=',$id)
					->first();
		return view('sektor_usaha_ubah')->with('sektor',$data);
	}
	public function prosesUbahSektor($id)
	{
		$data = [
			'nama' => Input::get('nama')
		];
		DB::table('sektors')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('admin/sektor-usaha')->with('message','Berhasil mengubah sektor usaha ' . Input::get('nama'));
	}
	public function hapusSektor($id)
	{
		$data = DB::table('sektors')
					->where('id','=',$id)
					->first();
		return view('sektor_usaha_hapus')->with('sektor',$data);
	}
	public function prosesHapusSektor()
	{
		DB::table('sektors')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('admin/sektor-usaha')->with('message','Berhasil menghapus sektor usaha ' . Input::get('nama'));
	}
}
