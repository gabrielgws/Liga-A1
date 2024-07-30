<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_rules', function (Blueprint $table) {
            $table->id(); // Cria uma coluna 'id' para chave primária
            $table->unsignedBigInteger('player_id'); // Cria a coluna 'player_id' como chave estrangeira
            $table->unsignedBigInteger('rule_id'); // Cria a coluna 'rule_id' como chave estrangeira
            $table->timestamps(); // Cria colunas 'created_at' e 'updated_at'

            // Define as chaves estrangeiras e suas restrições
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');

            // Cria um índice único para garantir que uma combinação específica de player_id e rule_id não possa ser duplicada
            $table->unique(['player_id', 'rule_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_rules');
    }
};
