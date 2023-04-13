<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompartilhamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compartilhamento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manifestacao_id')->unsigned();
            $table->foreign('manifestacao_id')->references('id')->on('manifestacoes');
            $table->integer('secretaria_id')->unsigned();
            $table->foreign('secretaria_id')->references('id')->on('secretarias');
            $table->text('texto_compartilhamento')->nullable();
            $table->text('resposta')->nullable();
            $table->dateTime('data_inicial');
            $table->dateTime('data_resposta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compartilhamento');
    }
}
