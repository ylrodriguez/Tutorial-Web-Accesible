<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',70);
            $table->string('email',70)->unique();
            $table->string('username',15)->unique();
            $table->string('password', 60);
            $table->string('pais', 5);
            $table->string('biografia',255);
            $table->integer('puntos');
            $table->date('fecha_nac'); //1995-09-24

            $table->enum('discapacidad',['none','ceguera','daltonismo','bajaVision','sordera','otra'])->default('none');
            $table->enum('type',['admin','member'])->default('member');
            
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
