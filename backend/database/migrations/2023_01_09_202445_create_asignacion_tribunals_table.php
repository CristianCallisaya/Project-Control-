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
        Schema::create('asignacion_tribunals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_tribunal');
            $table->string('cartaEnvio')->default('pendiente')->nullable();
            $table->string('cartaRespuesta')->default('pendiente')->nullable();
            $table->string('fechaAsignacion');
            $table->string('fechaDesactivar')->nullable();
            $table->boolean('asiEstado')->default(1);
            $table->foreign('id_tribunal')->references('id')->on('docentes');
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignacion_tribunals');
    }
};
