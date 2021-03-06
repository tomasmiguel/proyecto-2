<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuentrosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuentros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cruce_id')->unsigned()->nullable();
            $table->bigInteger('prode_id')->unsigned()->nullable();
            $table->bigInteger('id_A')->unsigned()->nullable();
            $table->bigInteger('id_B')->unsigned()->nullable();
            $table->bigInteger('id_pasa')->unsigned()->nullable(); //id del equipo que pasa

            $table->timestamps();

             //relacion constraint
             $table->foreign('cruce_id')->references('id')->on('cruces')->onDelete('cascade');
             $table->foreign('prode_id')->references('id')->on('prodes')->onDelete('cascade');
             $table->foreign('id_A')->references('id')->on('equipos')->onDelete('cascade');
             $table->foreign('id_B')->references('id')->on('equipos')->onDelete('cascade');
             $table->foreign('id_pasa')->references('id')->on('equipos')->onDelete('cascade');
             
             

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encuentros');
    }
}
