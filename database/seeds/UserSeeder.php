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
        \App\User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('naon12345'),
            'role' => 'user',
        ]);

         \App\User::create([
            'name' => 'Admin',
            'email' => 'admin1@gmail.com',
            'password' => bcrypt('naon123456'),
            'role' => 'admin',
        ]);
    }
}
