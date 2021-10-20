<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        DB::table('users')->insert([
            'name' => 'Djalma',
            'email' => 'djalma@djalma.com',
            'password' => Hash::make('senha123321'),
            'nivel' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Karina',
            'email' => 'karina@karina.com',
            'password' => Hash::make('karina@123'),
            'nivel' => 'admin'
        ]);
        DB::table('users')->insert([
            'name' => 'Pedro',
            'email' => 'pedro@pedro.com',
            'password' => Hash::make('pedro@123'),
            'nivel' => 'admin'
        ]);
    }
}
