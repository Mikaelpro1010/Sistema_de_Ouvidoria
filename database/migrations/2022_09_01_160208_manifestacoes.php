<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Manifestacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manifestacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('protocolo')->nullable(false);
            $table->string('senha')->nullable(false);
            $table->integer('situacao_id')->unsigned();
            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->integer('tipo_manifestacao_id')->unsigned();
            $table->foreign('tipo_manifestacao_id')->references('id')->on('tipos_manifestacao');
            $table->integer('estado_processo_id')->unsigned();
            $table->foreign('estado_processo_id')->references('id')->on('estados_processo');
            $table->integer('motivacao_id')->unsigned();
            $table->foreign('motivacao_id')->references('id')->on('motivacoes');
            $table->text('manifestacao');

            $table->text('contextualizacao')->nullable();
            $table->text('providencia_adotada')->nullable();
            $table->text('conclusao')->nullable();

            $table->string('nome')->nullable();
            $table->boolean('anonimo')->nullable();
            $table->string('email')->nullable();
            $table->string('numero_telefone')->nullable();
            $table->string('tipo_telefone')->nullable();
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();           

            $table->dateTime('data_finalizacao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manifestacoes');
    }
}
