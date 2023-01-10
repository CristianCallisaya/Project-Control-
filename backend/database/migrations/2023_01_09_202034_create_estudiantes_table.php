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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_carrera');
            $table->string('esNombres',90);
            $table->string('esPaterno',90);
            $table->string('esMaterno',90);
            $table->string('esCelular',60);
            $table->string('esTituloProyecto',255);
            $table->string('esGenero', 60);
            $table->boolean('esEstado')->default(1);
            $table->string('esFinal')->default('realizar solicitud tutor')->nullable();
            $table->string('habilitacion')->default('primer panelP');
            $table->string('esSolicitud')->default('falta');
            $table->string('esAsignacion')->default('falta');
            $table->string('confirmacionAsignacion')->default('falta');
            $table->foreign('id_carrera')->references('id')->on('carreras');
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
        Schema::dropIfExists('estudiantes');
    }
};
