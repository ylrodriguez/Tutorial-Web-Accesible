<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluacion_id')->unsigned();
            $table->string('pregunta');

            //Llave foránea.
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones')->onDelete('cascade');

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
        Schema::drop('preguntas');
    }
}
