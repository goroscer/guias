<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceptoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptorias', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('n');
            $table->string('localidad');
            $table->string('dpto');
            $table->string('domicilio');
            $table->string('telefono');
            $table->string('cpostal');
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
        Schema::dropIfExists('receptorias');
    }
}
