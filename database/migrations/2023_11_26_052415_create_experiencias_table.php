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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('usuario_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->unsignedBigInteger('perfil_id')->comment('Campo FK relacionado con la tabla perfiles');

            $table->string('nombre')->nullable()->comment('Campo que indica el nombre de la empresa ');
            $table->string('web_empresa')->nullable()->comment('Campo que indica el nombre de la empresa ');
            $table->date('fecha_inicio')->nullable()->comment('Campo que indicará duración ');
            $table->date('fecha_fin')->nullable()->comment('Campo que indicará duración');
            $table->string('descripcion')->nullable()->comment('Campo que indica la descripcion de la experiencia ');

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
        Schema::dropIfExists('experiencias');
    }
};
