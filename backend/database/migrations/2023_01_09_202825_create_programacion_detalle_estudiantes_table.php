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
        Schema::create('programacion_detalle_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_programacion');
            $table->string('esCorrecion')->default('pendiente')->nullable();
            $table->string('fechaCorrecion')->nullable();
            $table->string('fechaLimiteCorrecion')->nullable();
            $table->foreign('id_programacion')->references('id')->on('programacions')->onDelete('cascade');
            $table->foreign('id_estudiante')->references('id')->on('estudiantes');
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
        Schema::dropIfExists('programacion_detalle_estudiantes');
    }
};
