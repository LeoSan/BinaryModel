<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sociales', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('usuario_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->unsignedBigInteger('perfil_id')->comment('Campo FK relacionado con la tabla perfiles');
            $table->string('nombre')->comment('Campo que indica el nombre de la red social ');
            $table->string('url')->comment('Campo que indica la direccion web de la red social');
            $table->boolean('activo')->default(true)->comment('campo que indica esta activo');


            $table->timestamps();
            //Relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('perfil_id')->references('id')->on('perfiles')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sociales');
    }
};
