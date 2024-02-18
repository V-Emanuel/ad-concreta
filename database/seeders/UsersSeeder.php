<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Victor',
            'email' => 'victor@example.com',
            'password' => Hash::make('victor123'),
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Vinicius Guimarães',
            'email' => 'vinicius@example.com',
            'password' => Hash::make('vinicius123'),
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
