<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('onibus');
            $table->string('motorista');
            //$table->string('origem');
            //$table->string('destino');
            $table->string('via');
            $table->time('horario');
            $table->integer('paradas_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('rotas', function ($table) {
            $table->foreign('paradas_id')->references('id')->on('paradas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rotas');
    }
}
