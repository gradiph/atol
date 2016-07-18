<?php

use Illuminate\Database\Seeder;
use Mobilocator\Pemilik;

class PemiliksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Pemilik;
			$data->id_users = '4';
			$data->no_ktp = '3274150595017';
			$data->no_hp = '08886263895';
			$data->alamat = 'Jl Dipati Ukur no 112 Bandung';
			$data->tempat_lahir = 'Cirebon';
			$data->tgl_lahir = '1995-05-15';
			$data->gambar_ktp = 'ktp-4.jpg';
			$data->status = 'Menunggu';
			$data->token = '';
		$data->save();
        $data = new Pemilik;
			$data->id_users = '5';
			$data->no_ktp = '3274150595015';
			$data->no_hp = '08886263892';
			$data->alamat = 'Jl Dipati Ukur no 114 Bandung';
			$data->tempat_lahir = 'Bandung';
			$data->tgl_lahir = '1995-03-14';
			$data->gambar_ktp = 'ktp-4.jpg';
			$data->status = 'Aktif';
			$data->token = '';
		$data->save();
    }
}