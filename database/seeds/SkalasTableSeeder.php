<?php

use Illuminate\Database\Seeder;
use Mobilocator\Skala;

class SkalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Skala;
			$data->nama = 'Mikro';
		$data->save();
        $data = new Skala;
			$data->nama = 'Menengah';
		$data->save();
        $data = new Skala;
			$data->nama = 'Makro';
		$data->save();
    }
}
