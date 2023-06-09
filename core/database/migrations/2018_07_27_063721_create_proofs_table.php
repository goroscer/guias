<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proofs', function (Blueprint $table) {
            $table->increments('id');


            $table->string('tipo')->nullable();
            $table->string('nro')->nullable();

            $table->string('name')->nullable();
            $table->string('file')->nullable();

            $table->date('fecha');



            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');


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
        Schema::dropIfExists('establishments');
    }
}
