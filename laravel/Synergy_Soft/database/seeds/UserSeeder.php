<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create(array(
            'username' => 'Admin',
            'password' => bcrypt('Admin'),
            'department' => 0
        ));

        \App\User::create(array(
            'username' => 'Finance',
            'password' => bcrypt('Finance'),
            'department' => 1
        ));

        \App\User::create(array(
            'username' => 'Sales',
            'password' => bcrypt('Sales'),
            'department' => 2
        ));
    }
}
