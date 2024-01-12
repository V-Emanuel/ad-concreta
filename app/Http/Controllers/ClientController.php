<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Services\S3Service;

class ClientController extends Controller
{
    use S3Service;
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
            'cep' => $data['cep'] ?? 'null',
            'rua' => $data['rua'],
            'bairro' => $data['bairro'] ?? 'null',
            'numero' => $data['numero'] ?? 'null',
            'cidade' => $data['cidade'] ?? 'null',
            'estado' => $data['estado'] ?? 'null',
        ];

        $cliente = new Cliente([
            'nome' => $data['nome'] ?? 'null',
            'situacao' => $data['situacao'] ?? 'null',
            'celular' => $data['celular'] ?? 'S/N',
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
            'endereco' => $endereco,
            'documentos' => [],
            'observacoes' => [],
        ]);

        $cliente->save();

        return redirect()->route('clients')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function updateDocument(Request $request)
    {

        if (empty($request->documento)) {
            return redirect()->route('clientes')->with('success', 'Favor Selecionar um documento');
        }

        $data = $request->all();

        $cliente = Cliente::find($data['cliente_id']);

        $nomeArquivo = uniqid() . '.' . $request->documento->getClientOriginalExtension();

        $request->documento->storeAs('public/documentos', $nomeArquivo);

        $pathArquivo = storage_path() . '\app\public\documentos\\' . $nomeArquivo;

        $url = $this->uploadToS3($request->file('documento'), $pathArquivo);

        $document = [
            'nome' => $data['nome'],
            'descricao' => $data['descricao'],
            'url' => $url,
            'type' => $request->documento->getClientOriginalExtension()
        ];

        $documentos = $cliente->documentos;

        if (!empty($documentos)) {
            $cliente->documentos = array_merge($cliente->documentos, [$document]);
        } else {
            $cliente->documentos = [$document];
        }

        $cliente->save();

        return redirect()->route('clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }
}
