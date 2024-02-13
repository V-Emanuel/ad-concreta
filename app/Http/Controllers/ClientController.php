<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Services\S3Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Services\Helpers;

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
            'url_img' => "",
            'documentos' => [],
            'observacoes' => [],
            'userId' => Auth::id()
        ]);

        $cliente->save();

        return redirect()->route('clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function updateDocument(Request $request)
    {

        if (empty($request->file('arquivos'))) {
            return redirect()->route('clientes')->with('success', 'Favor Selecionar um documento');
        }

        $dataRequest = $request->all();

        $cliente = Cliente::find($dataRequest['cliente_id']);

        $documentos = $cliente->documentos;

        $clienteNome = $this->removerAcentos($dataRequest['cliente_nome']);

        $clienteNome = $this->removerCaracteresEspeciais($clienteNome);

        foreach ($request->file('arquivos') as $index => $arquivo) {

            $nomeArquivo = uniqid() . '.' . $arquivo->getClientOriginalExtension();

            $pathArquivo = storage_path() . '\app\public\documentos\\' . $nomeArquivo;

            $arquivo->storeAs('documentos', $nomeArquivo);

            $url = $this->uploadToS3($arquivo, $pathArquivo, 'documentos/' . $clienteNome);

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

        return Redirect::route('clienteId', $dataRequest['cliente_id']);
    }

    public function updadeObservations(Request $request)
    {
        $dataRequest = $request->all();

        $date = Carbon::now();
        $client = Cliente::find($dataRequest['cliente_id']);

        $obs = ['texto' => $dataRequest['texto'], 'data' => $date->format('d/m/Y H:i:s')];

        if (!empty($client->observacoes)) {
            $client->observacoes = array_merge([$obs], $client->observacoes);
        } else {
            $client->observacoes = [$obs];
        }

        $client->save();

        return Redirect::route('clienteId', $dataRequest['cliente_id']);
    }
}
