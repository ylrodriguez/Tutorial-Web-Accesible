<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leccion_id')->unsigned();
            $table->string('descripcion');

            //Llave foránea.
            $table->foreign('leccion_id')->references('id')->on('lecciones')->onDelete('cascade');


            $table->timestamps();
        });


        //Tabla pivot
        Schema::create('user_evaluacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('evaluacion_id')->unsigned();
            $table->integer('puntaje');
            $table->integer('intentos');

            //Llave foránea.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('evaluaciones');
        Schema::drop('user_evaluacion');

    }
}
