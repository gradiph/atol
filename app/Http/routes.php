<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','GuestController@home');
Route::get('location','GuestController@home');
Route::get('login','GuestController@home');
Route::get('reviewlocation','GuestController@home');
Route::get('pemilik_register','GuestController@home');
Route::get('usaha','GuestController@home');
Route::get('contact','GuestController@home');

Route::get('member','MemberController@home');

Route::get('admin', 'MainController@homeAdmin');
Route::get('admin/login','MainController@loginAdmin');
Route::get('admin/logout','MainController@logoutAdmin');
Route::post('admin/processLogin', 'MainController@prosesLoginAdmin');

Route::get('admin/pemilik-usaha','PemilikController@home');
Route::get('admin/pemilik-usaha/{id}/aktifkan','PemilikController@aktifkan');
Route::get('admin/pemilik-usaha/{id}/non-aktifkan','PemilikController@nonAktifkan');
Route::get('admin/pemilik-usaha/{id}/ubah','PemilikController@ubah');
Route::post('admin/pemilik-usaha/{id}/ubah/proses','PemilikController@prosesUbah');
Route::get('admin/pemilik-usaha/{id}/hapus','PemilikController@hapus');
Route::post('admin/pemilik-usaha/{id}/hapus/proses','PemilikController@prosesHapus');

Route::get('admin/wilayah','WilayahController@home');
Route::get('admin/wilayah/kecamatan/baru','WilayahController@tambahKecamatan');
Route::post('admin/wilayah/kecamatan/baru/proses','WilayahController@prosesTambahKecamatan');
Route::get('admin/wilayah/kecamatan/{id}/ubah','WilayahController@ubahKecamatan');
Route::post('admin/wilayah/kecamatan/{id}/ubah/proses','WilayahController@prosesUbahKecamatan');
Route::get('admin/wilayah/kecamatan/{id}/hapus','WilayahController@hapusKecamatan');
Route::post('admin/wilayah/kecamatan/{id}/hapus/proses','WilayahController@prosesHapusKecamatan');
Route::get('admin/wilayah/kecamatan/{id_kec}/kelurahan/baru','WilayahController@tambahKelurahan');
Route::post('admin/wilayah/kecamatan/{id_kec}/kelurahan/baru/proses','WilayahController@prosesTambahKelurahan');
Route::get('admin/wilayah/kecamatan/{id_kec}/kelurahan/{id_kel}/ubah','WilayahController@ubahKelurahan');
Route::post('admin/wilayah/kecamatan/{id_kec}/kelurahan/{id_kel}/ubah/proses','WilayahController@prosesUbahKelurahan');
Route::get('admin/wilayah/kecamatan/{id_kec}/kelurahan/{id_kel}/hapus','WilayahController@hapusKelurahan');
Route::post('admin/wilayah/kecamatan/{id_kec}/kelurahan/{id_kel}/hapus/proses','WilayahController@prosesHapusKelurahan');

Route::get('admin/sektor-usaha','SektorController@home');
Route::get('admin/sektor-usaha/baru','SektorController@tambahSektor');
Route::post('admin/sektor-usaha/baru/proses','SektorController@prosesTambahSektor');
Route::get('admin/sektor-usaha/{id}/ubah','SektorController@ubahSektor');
Route::post('admin/sektor-usaha/{id}/ubah/proses','SektorController@prosesUbahSektor');
Route::get('admin/sektor-usaha/{id}/hapus','SektorController@hapusSektor');
Route::post('admin/sektor-usaha/{id}/hapus/proses','SektorController@prosesHapusSektor');

Route::get('admin/skala-usaha','SkalaController@home');
Route::get('admin/skala-usaha/baru','SkalaController@tambahSkala');
Route::post('admin/skala-usaha/baru/proses','SkalaController@prosesTambahSkala');
Route::get('admin/skala-usaha/{id}/ubah','SkalaController@ubahSkala');
Route::post('admin/skala-usaha/{id}/ubah/proses','SkalaController@prosesUbahSkala');
Route::get('admin/skala-usaha/{id}/hapus','SkalaController@hapusSkala');
Route::post('admin/skala-usaha/{id}/hapus/proses','SkalaController@prosesHapusSkala');

Route::get('admin/data-usaha','UsahaController@home');
Route::get('admin/data-usaha/{id}/aktifkan','UsahaController@aktifkan');
Route::get('admin/data-usaha/{id}/non-aktifkan','UsahaController@nonAktifkan');
Route::get('admin/data-usaha/{id}/ubah','UsahaController@ubah');
Route::post('admin/data-usaha/{id}/ubah/proses','UsahaController@prosesUbah');
Route::get('admin/data-usaha/{id}/hapus','UsahaController@hapus');
Route::post('admin/data-usaha/{id}/hapus/proses','UsahaController@prosesHapus');

Route::get('admin/laporan','LaporanController@lihat');
Route::post('admin/laporan/export','LaporanController@export');

Route::get('admin/user/{id}','UserController@settingAdmin');
Route::post('admin/user/{id}/proses','UserController@prosesSettingAdmin');

Route::get('superadmin', 'MainController@homeSAdmin');
Route::get('superadmin/logout','MainController@logoutAdmin');

Route::get('superadmin/user','UserController@home');
Route::get('superadmin/user/baru','UserController@tambah');
Route::post('superadmin/user/baru/proses','UserController@prosesTambah');
Route::get('superadmin/user/{id}/ubah','UserController@ubah');
Route::post('superadmin/user/{id}/ubah/proses','UserController@prosesUbah');
Route::get('superadmin/user/{id}/hapus','UserController@hapus');
Route::post('superadmin/user/{id}/hapus/proses','UserController@prosesHapus');
Route::get('superadmin/user/{id}','UserController@settingSAdmin');
Route::post('superadmin/user/{id}/proses','UserController@prosesSettingSAdmin');
