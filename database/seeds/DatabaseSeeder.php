<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(KecamatansTableSeeder::class);
        $this->call(KelurahansTableSeeder::class);
        $this->call(PemiliksTableSeeder::class);
        $this->call(SektorsTableSeeder::class);
        $this->call(SkalasTableSeeder::class);
        $this->call(UsahasTableSeeder::class);
    }
}
