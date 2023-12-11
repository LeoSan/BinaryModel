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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('usuario_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->string('ruta')->nullable()->comment('Campo Ruta');
            $table->string('nombre')->nullable()->comment('Campo nombre del sistema ');
            $table->string('nombre_anexo')->nullable()->comment('Campo nombre anexo que le coloca el asuario');
            $table->string('descripcion')->nullable()->comment('Campo desribe la imagen');
            $table->string('extension')->nullable()->comment('Campo extension');
            $table->string('peso')->nullable()->comment('Campo peso de la imagen');
            $table->string('tipo')->nullable()->comment('Campo  indica el tipo de la imagen');

            $table->timestamps();
            $table->softDeletes();

            //Relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
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
