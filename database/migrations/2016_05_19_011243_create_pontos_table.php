<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePontosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('lat', 20, 17);
            $table->decimal('lng', 20, 17);
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
        Schema::drop('pontos');
    }
}
