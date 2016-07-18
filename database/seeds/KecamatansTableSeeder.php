<?php

use Illuminate\Database\Seeder;
use Mobilocator\Kecamatan;

class KecamatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Kecamatan;
			$data->nama = 'Lembang';
			$data->kode_pos = '40391';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cisarua';
			$data->kode_pos = '40551';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Ngamprah';
			$data->kode_pos = '40552';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Padalarang';
			$data->kode_pos = '40553';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cipatat';
			$data->kode_pos = '40554';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cikalong Wetan';
			$data->kode_pos = '40556';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cipeundeuy';
			$data->kode_pos = '40558';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Parongpong';
			$data->kode_pos = '40559';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Batujajar';
			$data->kode_pos = '40561';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Saguling';
			$data->kode_pos = '40561';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cihampelas';
			$data->kode_pos = '40562';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cililin';
			$data->kode_pos = '40562';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Sindangkerta';
			$data->kode_pos = '40563';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Cipongkor';
			$data->kode_pos = '40564';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Gununghalu';
			$data->kode_pos = '40565';
		$data->save();
        $data = new Kecamatan;
			$data->nama = 'Rongga';
			$data->kode_pos = '40566';
		$data->save();
    }
}