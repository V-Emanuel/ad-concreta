<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AgendamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();


        $quantidadeRegistros = 10;

        for ($i = 0; $i < $quantidadeRegistros; $i++) {

            $date = $faker->dateTimeBetween('-1 year', '+1 year');

            DB::table('agendamentos')->insert([
                'texto' => $faker->sentence,
                'hora' => $date->format('H:i'),
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
