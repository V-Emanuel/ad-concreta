<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'situacao',
        'celular',
        'naturalidade',
        'estado_civil',
        'profissao',
        'nome_mae',
        'nome_pai',
        'rg',
        'cpf',
        'nascimento',
        'cidade_nascimento',
        'estado_nascimento',
        'endereco',
        'documentos',
        'observacoes'
    ];

    protected $casts = [
        'endereco' => 'json',
        'documentos' => 'json',
        'observacoes' => 'json'
    ];
}
