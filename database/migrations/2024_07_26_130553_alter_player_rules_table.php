<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPlayerRulesTable extends Migration
{
    public function up()
    {
        Schema::table('player_rules', function (Blueprint $table) {
            // Remover as restrições de chave estrangeira temporariamente
            $table->dropForeign(['player_id']);
            $table->dropForeign(['rule_id']);

            // Remover o índice único
            $table->dropUnique('player_rules_player_id_rule_id_unique');

            // Verificar se a coluna custom_description não existe antes de adicioná-la
            if (!Schema::hasColumn('player_rules', 'custom_description')) {
                $table->string('custom_description')->nullable();
            }

            // Adicionar as chaves estrangeiras novamente
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('player_rules', function (Blueprint $table) {
            // Remover o campo de descrição personalizada
            if (Schema::hasColumn('player_rules', 'custom_description')) {
                $table->dropColumn('custom_description');
            }

            // Remover as chaves estrangeiras
            $table->dropForeign(['player_id']);
            $table->dropForeign(['rule_id']);

            // Adicionar o índice único de volta
            $table->unique(['player_id', 'rule_id']);

            // Adicionar as chaves estrangeiras novamente
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->foreign('rule_id')->references('id')->on('rules')->onDelete('cascade');
        });
    }
}
