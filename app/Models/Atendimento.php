<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    use HasFactory;
    protected $table = 'atendimentos';
    protected $fillable = ['nome', 'cidadeId', 'ramoId', 'celular', 'texto'];

    // Relacionamento com a tabela 'cidades'
    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidadeId');
    }

    // Relacionamento com a tabela 'ramos'
    public function ramo()
    {
        return $this->belongsTo(Ramo::class, 'ramoId');
    }
}
