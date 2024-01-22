<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'user_id' => Auth::id()
        ]);

        $cliente->save();

        return redirect()->route('clients')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function updateDocument(Request $request)
    {

        if (empty($request->file('arquivos'))) {
            return redirect()->route('clientes')->with('success', 'Favor Selecionar um documento');
        }

        $dataRequest = $request->all();

        $cliente = Cliente::find($dataRequest['cliente_id']);

        $documentos = $cliente->documentos;

        foreach ($request->file('arquivos') as $index => $arquivo) {

            $nomeArquivo = uniqid() . '.' . $arquivo->getClientOriginalExtension();

            $pathArquivo = storage_path() . '\app\public\documentos\\' . $nomeArquivo;

            $arquivo->storeAs('public/documentos', $nomeArquivo);

            $url = $this->uploadToS3($arquivo, $pathArquivo);

            if (Storage::exists($pathArquivo)) {
                Storage::delete($pathArquivo);
            }

            $dados[] = [
                'cliente_id' => $dataRequest['cliente_id'],
                'nome' => $request->nomes[$index],
                'descricao' => $request->descricoes[$index],
                'url' => $url,
                'type' => $arquivo->getClientOriginalExtension()
            ];
        }

        if (!empty($documentos)) {
            $cliente->documentos = array_merge($cliente->documentos, $dados);
        } else {
            $cliente->documentos = $dados;
        }

        $cliente->save();

        return redirect()->route('clientes')->with('success', 'Documento(s) cadastrados com sucesso!');
    }
}
