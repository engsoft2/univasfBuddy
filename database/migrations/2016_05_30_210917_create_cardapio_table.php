<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardapioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardapio', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('type'); //almoço ou jantar
            $table->text('sld_crua');
            $table->text('sld_cozida');
            $table->text('prt_principal');
            $table->text('guarnicao');
            $table->text('cereal');
            $table->text('leguminosa');
            $table->text('vegetariano');
            $table->text('sobremesa');
            $table->text('sopa');
            $table->text('bebida');
            //$table->timestamps();
        });
        Schema::rename('cardapio', 'cardapios');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cardapio');
    }
}
