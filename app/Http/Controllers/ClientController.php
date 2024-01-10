<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientController extends Controller
{
    public function create(Request $request)
    {

        $data = $request->all();

        foreach ($data as $chave => $valor) {
            if ($chave === 'naturalidade') {
                if ($valor === 'outro' || $valor === '' || $valor === null) {
                    $data['naturalidade'] = $data['outroCampo'];
                }
            }
        }

        $endereco = [
            'cep'=> $data['cep'] ?? 'null',
            'rua'=> $data['rua'] ,
            'bairro'=> $data['bairro'] ?? 'null',
            'numero'=> $data['numero'] ?? 'null',
            'cidade'=> $data['cidade'] ?? 'null',
            'estado'=> $data['estado'] ?? 'null' ,
        ];

        $cliente = new Cliente([
            'nome' => $data['nome']  ?? 'null',
            'situacao' => $data['situacao']  ?? 'null',
            'celular' => $data['celular']  ?? 'S/N',
            'naturalidade' => $data['naturalidade'] ?? 'null',
            'estado_civil' => $data['estado_civil'] ?? 'null',
            'profissao' => $data['profissao'] ?? 'null',
            'nome_mae' => $data['nome_mae'] ?? 'null',
            'nome_pai' => $data['nome_pai'] ?? 'null',
            'rg' => $data['rg'] ?? 'null',
            'cpf' => $data['cpf'] ?? 'null',
            'nascimento' => $data['nascimento'] ?? 'null',
            'cidade_nascimento' => $data['cidade_nascimento'] ?? 'null',
            'estado_nascimento' => $data['estado_nascimento'] ?? 'null',
            'endereco' =>  $endereco,
            'documentos' => [], 
            'observacoes' => [], 
        ]);

        $cliente->save();

        return redirect()->route('clients')->with('success', 'Cliente cadastrado com sucesso!');
    }
}
