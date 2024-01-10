<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cidades = [
            ['nome' => 'Antônio Gonçalves'],
            ['nome' => 'Campo Formoso'],
            ['nome' => 'Jacobina'],
            ['nome' => 'Pindobaçu'],
            ['nome' => 'Senhor do Bonfim'],
        ];

        DB::table('cidades')->insert($cidades);
    }
}
