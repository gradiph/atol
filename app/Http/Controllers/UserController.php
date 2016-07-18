<?php

namespace Mobilocator\Http\Controllers;

use Illuminate\Http\Request;
use Mobilocator\Http\Requests;
use DB;
use Input;
use Redirect;

class UserController extends Controller
{
    public function settingAdmin($id)
	{
		$data = DB::table('users')->where('id','=',$id)->first();
		return view('admin_user_setting')->with('user',$data);
	}
	public function prosesSettingAdmin()
	{
		$old_pass = Input::get('old_password');
		$new_pass = Input::get('password');
		$re_pass = Input::get('re-password');
		$id = Input::get('id');
		
		$datadb = DB::table('users')
						->select('password')
						->where('id','=',$id)
						->first();
		if($new_pass == $re_pass)
		{
			$data = [
				'password' => bcrypt($new_pass)
			];
			DB::table('users')->where('id','=',$id)->update($data);
			return Redirect::to('admin/user/'.$id)->with('message','Sukses mengubah password');
		}
		else
			return Redirect::to('admin/user/'.$id)->with('message','New Password tidak sama dengan Re-New Password');
	}
	public function home()
	{
		$data = DB::table('users')->paginate(25);
		
		return view('users_home')->with('data',$data);
	}
	public function tambah()
	{
		return view('user_tambah');
	}
	public function prosesTambah()
	{
		$data = [
			'username' => Input::get('username'),
			'nama' => Input::get('nama'),
			'email' => Input::get('email'),
			'level' => Input::get('level')
		];
		DB::table('users')->insertGetId($data);
		return Redirect::to('superadmin/user')->with('message','Berhasil menambah user ' . Input::get('nama'));
	}
	public function ubah($id)
	{
		$data = DB::table('users')
					->where('id','=',$id)
					->first();
		return view('user_ubah')->with('data',$data);
	}
	public function prosesUbah($id)
	{
		$data = [
			'username' => Input::get('username'),
			'nama' => Input::get('nama'),
			'email' => Input::get('email'),
			'level' => Input::get('level')
		];
		DB::table('users')->where('id','=',Input::get('id'))->update($data);
		return Redirect::to('superadmin/user')->with('message','Berhasil mengubah user ' . Input::get('nama'));
	}
	public function hapus($id)
	{
		$data = DB::table('users')
					->where('id','=',$id)
					->first();
		return view('user_hapus')->with('data',$data);
	}
	public function prosesHapus()
	{
		DB::table('users')->where('id','=',Input::get('id'))->delete();
		return Redirect::to('superadmin/user')->with('message','Berhasil menghapus user ' . Input::get('nama'));
	}
	public function settingSAdmin($id)
	{
		$data = DB::table('users')->where('id','=',$id)->first();
		return view('superadmin_user_setting')->with('data',$data);
	}
	public function prosesSettingSAdmin()
	{
		$new_pass = Input::get('password');
		$re_pass = Input::get('re-password');
		$id = Input::get('id');
		
		$datadb = DB::table('users')
						->select('password')
						->where('id','=',$id)
						->first();
		if($new_pass == $re_pass)
		{
			$data = [
				'password' => bcrypt($new_pass)
			];
			DB::table('users')->where('id','=',$id)->update($data);
			return Redirect::to('superadmin/user')->with('message','Sukses mengubah password');
		}
		else
			return Redirect::to('superadmin/user')->with('message','New Password tidak sama dengan Re-New Password');
	}
}
