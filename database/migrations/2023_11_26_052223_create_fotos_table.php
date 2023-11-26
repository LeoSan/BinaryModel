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
        Schema::create('fotos', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Campo Primary Key');
            $table->unsignedBigInteger('usuario_id')->comment('Campo FK relacionado con la tabla usuario');
            $table->unsignedBigInteger('perfil_id')->comment('Campo FK relacionado con la tabla perfiles');
            $table->unsignedBigInteger('catalogo_id')->comment('Campo FK relacionado con la tabla catalogo');
            $table->string('url_fotografia')->comment('Campo que indica el source de la foto');
            $table->boolean('activo')->default(true)->comment('campo que indica esta activo');

            
            $table->timestamps();

            //Relaciones
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('perfil_id')->references('id')->on('perfiles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('catalogo_id')->references('id')->on('catalogos')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fotos');
    }
};
