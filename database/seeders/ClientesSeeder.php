<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = [];
        $date = Carbon::now();

        for ($i = 1; $i <= 20; $i++) {
            $endereco = [
                'cep' => '58429-100',
                'rua' => 'Rua João Julião Martins',
                'bairro' => 'Universitário',
                'cidade' => 'Campina Grande',
                'estado' => 'PB',
                'numero' => '808',
            ];

            $documentos = []; // Pode ser vazio ou adicionar documentos, conforme necessário.

            $observacoes = [
                [
                    "texto" => 'Observação 1 para Cliente ' . $i,
                    "data" => $date->format('Y-m-d H:i:s')
                ],
                [
                    "texto" => 'Observação 1 para Cliente ' . $i,
                    "data" => $date->format('Y/m/d - H:i:s')
                ]
            ];

            $clientes[] = [
                'nome' => 'Cliente ' . $i,
                'situacao' => 'Ativo',
                'celular' => '9' . rand(100000000, 999999999),
                'naturalidade' => 'Naturalidade Cliente ' . $i,
                'estado_civil' => 'Estado Civil Cliente ' . $i,
                'profissao' => 'Profissão Cliente ' . $i,
                'nome_mae' => 'Mãe Cliente ' . $i,
                'nome_pai' => 'Pai Cliente ' . $i,
                'rg' => 'RG Cliente ' . $i,
                'cpf' => 'CPF Cliente ' . $i,
                'nascimento' => Carbon::now()->subYears(rand(18, 60))->format('Y-m-d'),
                'cidade_nascimento' => 'Cidade Nascimento Cliente ' . $i,
                'estado_nascimento' => 'Estado Nascimento Cliente ' . $i,
                'endereco' => json_encode($endereco),
                'documentos' => json_encode($documentos),
                'observacoes' => json_encode($observacoes),
                'url_img' => "",
                'userId' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('clientes')->insert($clientes);
    }
}
