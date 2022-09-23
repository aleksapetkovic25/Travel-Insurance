<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $password = '12345678';

        DB::table('users')->insert([
            'name' => 'Aleksandar',
            'email' => 'aleksandar@gmail.com',
            'level' => 1,
            'password' => Hash::make($password)
        ]);

        DB::table('users')->insert([
            'name' => 'Milos',
            'email' => 'milos@gmail.com',
            'level' => 1,
            'password' => Hash::make('password')
        ]);

        DB::table('users')->insert([
            'name' => 'Nenad',
            'email' => 'nenad@gmail.com',
            'level' => 1,
            'password' => Hash::make('password')
        ]);
    }
}
