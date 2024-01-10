<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('situacao');
            $table->string('celular');
            $table->string('naturalidade');
            $table->string('estado_civil');
            $table->string('profissao');
            $table->string('nome_mae');
            $table->string('nome_pai');
            $table->string('rg');
            $table->string('cpf');
            $table->string('nascimento');
            $table->string('cidade_nascimento');
            $table->string('estado_nascimento');
            $table->json('endereco');
            $table->json('documentos');
            $table->json('observacoes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
