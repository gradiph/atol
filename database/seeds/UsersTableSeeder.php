<?php

use Illuminate\Database\Seeder;
use Mobilocator\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new User;
			$data->username = 'sadmin1';
			$data->nama = 'SuperAdmin 1';
			$data->email= 'sadmin1@sigeo.com';
			$data->password = bcrypt('sadmin');
			$data->level = 'SuperAdmin';
		$data->save();
        $data = new User;
			$data->username = 'admin1';
			$data->nama = 'Admin 1';
			$data->email= 'admin1@sigeo.com';
			$data->password = bcrypt('admin');
			$data->level = 'Admin';
		$data->save();
        $data = new User;
			$data->username = 'admin2';
			$data->nama = 'Admin 2';
			$data->email= 'admin2@sigeo.com';
			$data->password = bcrypt('admin');
			$data->level = 'Admin';
		$data->save();
        $data = new User;
			$data->username = 'member1';
			$data->nama = 'Member 1';
			$data->email= 'member1@sigeo.com';
			$data->password = bcrypt('member');
			$data->level = 'Member';
		$data->save();
        $data = new User;
			$data->username = 'member2';
			$data->nama = 'Member 2';
			$data->email= 'member2@sigeo.com';
			$data->password = bcrypt('member');
			$data->level = 'Member';
		$data->save();
    }
}
