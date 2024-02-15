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

            $ano = rand(2020, 2025); 
            $mes = rand(1, 12); 
            $dia = rand(1, 28); 

            $hora = rand(0, 23); 
            $minuto = rand(0, 59); 

            $date = sprintf('%04d-%02d-%02d %02d:%02d:00', $ano, $mes, $dia, $hora, $minuto);

            DB::table('agendamentos')->insert([
                'texto' => $faker->sentence,
                'hora' => $date,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
