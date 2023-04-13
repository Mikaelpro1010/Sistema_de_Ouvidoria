<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recurso');
            $table->string('resposta')->nullable();
            $table->integer('manifestacao_id')->unsigned();
            $table->foreign('manifestacao_id')->references('id')->on('manifestacoes');
            $table->dateTime('data_recurso');
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
        //
    }
}
