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

        for ($i = 1; $i <= 50; $i++) {

            $ano = rand(2020, 2025); 
            $mes = rand(1, 12); 
            $dia = rand(1, 28); 

            $hora = rand(0, 23); 
            $minuto = rand(0, 59); 

            $date = sprintf('%04d-%02d-%02d %02d:%02d:00', $ano, $mes, $dia, $hora, $minuto);

            $atendimentos[] = [
                'nome' => $faker->name,
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
