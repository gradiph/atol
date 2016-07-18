<?php

use Illuminate\Database\Seeder;
use Mobilocator\Sektor;

class SektorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Sektor;
			$data->nama = 'Periklanan';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Arsitektur';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Pasar Barang Seni';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Kerajinan';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Desain';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Fashion';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Video';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Film dan Fotografi';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Permainan Interaktif';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Musik';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Seni Pertunjukan';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Penerbitan dan Percetakan';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Layanan Komputer dan Piranti Lunak';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Televisi dan Radio';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Riset dan Pengembang';
		$data->save();
        $data = new Sektor;
			$data->nama = 'Kuliner';
		$data->save();
    }
}