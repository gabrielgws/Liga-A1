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
        Schema::create('players', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária
            $table->unsignedBigInteger('user_id'); // Cria a coluna 'user_id'
            $table->integer('score')->default(0); // Cria a coluna 'score' com valor padrão 0
            $table->timestamps(); // Cria 'created_at' e 'updated_at'

            // Define a chave estrangeira para a tabela users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
};
