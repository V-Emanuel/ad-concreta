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
        for ($i = 1; $i <= 20; $i++){
            DB::table('users')->insert([
                'name' => 'user' . $i,
                'email' => 'user' . $i . "@example.com",
                'password' => Hash::make('user12345'),
                'admin' => 1,
                'clientes' => json_encode([]),
                'atendimentos' => json_encode([]),
                'documentos' => json_encode([]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
