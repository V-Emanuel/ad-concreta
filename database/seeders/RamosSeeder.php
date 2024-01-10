<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RamosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ramos = [
            ['nome' => 'Ambiental'],
            ['nome' => 'Civil'],
            ['nome' => 'Constitucional'],
            ['nome' => 'Consumidor'],
            ['nome' => 'Empresarial'],
            ['nome' => 'Previdenciário'],
            ['nome' => 'Tributário'],
        ];

        DB::table('ramos')->insert($ramos);
    }
}
