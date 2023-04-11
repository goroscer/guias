<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo')->nullable();

            $table->string('cuit')->nullable();
            $table->string('rs')->nullable();

            $table->string('cuit1')->nullable();
            $table->string('rs1')->nullable();
            $table->string('l1')->nullable();
            $table->string('cp1')->nullable();
            $table->text('df1')->nullable();

            $table->string('intermediario')->nullable();

            $table->string('cuit2')->nullable();
            $table->string('rs2')->nullable();
            $table->string('l2')->nullable();
            $table->string('cp2')->nullable();
            $table->text('df2')->nullable();
            $table->string('comi')->nullable();


            $table->string('origen_estable')->nullable();
            $table->string('origen_domi')->nullable();
            $table->string('origen_l')->nullable();

            $table->string('final_p')->nullable();
            $table->string('final_estable')->nullable();
            $table->string('final_domi')->nullable();
            $table->string('final_l')->nullable();

            $table->string('cuit3')->nullable();
            $table->string('rs3')->nullable();
            $table->string('l3')->nullable();
            $table->string('cp3')->nullable();
            $table->text('df3')->nullable();

            $table->string('cuit4')->nullable();
            $table->string('rs4')->nullable();
            $table->string('d4')->nullable();
            $table->string('p4')->nullable();
            $table->string('cuitc4')->nullable();
            $table->string('nombre4')->nullable();


            $table->string('r1')->nullable();
            $table->string('r2')->nullable();
            $table->string('r3')->nullable();
            $table->string('r4')->nullable();
            $table->string('r5')->nullable();


            $table->string('payment')->nullable();
            $table->string('receptoria')->nullable();

            $table->string('nrot_trs')->nullable();
            $table->string('nrot_iibb')->nullable();


            $table->string('comment')->nullable();

            $table->enum('estatus', ['Pendiente', 'Denegado', 'Aprobado', 'Pagado', 'Pagado - Vencido', 'Vencido'])->default('Pendiente');
            $table->string('resolucion')->nullable();


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
        Schema::dropIfExists('forms');
    }
}
