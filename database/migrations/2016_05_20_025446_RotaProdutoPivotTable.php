<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RotaProdutoPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rota_ponto', function (Blueprint $table) {
            $table->integer('ponto_id')->unsigned()->index();
            $table->foreign('ponto_id')->references('id')->on('pontos')->onDelete('cascade');
            $table->integer('rota_id')->unsigned()->index();
            $table->foreign('rota_id')->references('id')->on('rotas')->onDelete('cascade');
            $table->time('horario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rota_ponto');
    }
}
