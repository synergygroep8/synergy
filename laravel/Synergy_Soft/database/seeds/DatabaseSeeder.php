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
        // $this->call(UsersTableSeeder::class);
        for ($i = 0; $i < 200; $i++)
        {
            //$this->call(TblCustomersSeeder::class);
            $this->call(ProjectSeeder::class);
        }
        //$this->call(UserSeeder::class);

    }
}
