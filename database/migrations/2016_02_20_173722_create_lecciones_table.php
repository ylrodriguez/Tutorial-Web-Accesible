<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('lecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('curso_id')->unsigned();
            $table->string('titulo');
            $table->string('descripcion');
            $table->text('teoria');
            $table->string('linkvideo');

            //Llave foránea.
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');

            $table->timestamps();
        });

        //Tabla pivot
        Schema::create('user_leccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('leccion_id')->unsigned();
            $table->enum('state',['none','started','finished'])->default('none');
            $table->date('fecha_fin');

            //Llave foránea.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('leccion_id')->references('id')->on('lecciones')->onDelete('cascade');

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
       
        Schema::drop('lecciones');
        Schema::drop('user_leccion');
    }
}
