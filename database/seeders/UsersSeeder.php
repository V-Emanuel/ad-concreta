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
        // Usuário Victor
        DB::table('users')->insert([
            'name' => 'Victor',
            'email' => 'victor@example.com',
            'password' => Hash::make('victor123'),
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuário Vinicius
        DB::table('users')->insert([
            'name' => 'Vinicius',
            'email' => 'vinicius@example.com',
            'password' => Hash::make('vinicius123'),
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuário Viviane
        DB::table('users')->insert([
            'name' => 'Viviane',
            'email' => 'viviane@example.com',
            'password' => Hash::make('viviane123'),
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuário David
        DB::table('users')->insert([
            'name' => 'David',
            'email' => 'david@example.com',
            'password' => Hash::make('david123'),
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Usuário Fany
        DB::table('users')->insert([
            'name' => 'Fany',
            'email' => 'fany@example.com',
            'password' => Hash::make('fany123'),
            'admin' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
