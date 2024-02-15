<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AtendimentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $atendimentos = [];
        $faker = Faker::create();
        $date = $faker->dateTimeBetween('-1 year', '+1 year');

        for ($i = 1; $i <= 50; $i++) {
            $atendimentos[] = [
                'nome' => 'Cliente ' . $i,
                'cidadeId' => rand(1, 5),
                'ramoId' => rand(1, 7),
                'celular' => '9' . rand(100000000, 999999999),
                'texto' => 'Atendimento para o Cliente pororo ' . $i,
                'userId' => rand(1, 5),
                'created_at' => $date,
                'updated_at' => $date,
            ];
        }

        DB::table('atendimentos')->insert($atendimentos);
    }
}
