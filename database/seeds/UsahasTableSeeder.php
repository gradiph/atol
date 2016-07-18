<?php

use Illuminate\Database\Seeder;
use Mobilocator\Usaha;

class UsahasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Usaha;
			$data->id_pemilik = '1';
			$data->nama = 'Toko Kelontong';
			$data->alamat= 'Jl. Cihampelas No 131 Bandung';
			$data->lat= '-6.887354';
			$data->lng = '107.604059';
			$data->telepon = '08886263895';
			$data->produk_unggulan = 'Indomie';
			$data->deskripsi = 'Toko Kelontong menjual segala jenis barang keperluan sehari-hari.';
			$data->gambar_foto = 'foto-4.jpg';
			$data->id_skala = '1';
			$data->id_sektor = '16';
			$data->id_kel = '102';
			$data->status = 'Tidak Aktif';
		$data->save();
        $data = new Usaha;
			$data->id_pemilik = '1';
			$data->nama = 'Warung Indomie';
			$data->alamat= 'Jl. Cihampelas No 129 Bandung';
			$data->lat= '-6.887346';
			$data->lng = '107.604074';
			$data->telepon = '08886263895';
			$data->produk_unggulan = 'Indomie';
			$data->deskripsi = 'Warung Indomie menyediakan aneka rasa dan variasi dari Indomie.';
			$data->gambar_foto = 'foto-4.jpg';
			$data->id_skala = '2';
			$data->id_sektor = '16';
			$data->id_kel = '102';
			$data->status = 'Menunggu';
		$data->save();
    }
}