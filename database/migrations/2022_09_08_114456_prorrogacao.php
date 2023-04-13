<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prorrogacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prorrogacao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manifestacao_id')->unsigned();
            $table->foreign('manifestacao_id')->references('id')->on('manifestacoes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('motivo_solicitacao');
            $table->text('resposta')->nullable();
            $table->integer('situacao');
            $table->timestamp('data_resposta')->nullable();
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
        //
    }
}
