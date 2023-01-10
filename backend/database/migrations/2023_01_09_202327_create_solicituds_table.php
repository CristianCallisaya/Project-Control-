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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante');
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_modalidad');
            $table->string('solFecha');
            $table->string('solFechaLimit');
            $table->string('solNumeroRuta',50);
            $table->string('solFechaAprobar')->nullable();
            $table->string('solFechaDesactivar')->nullable();
            $table->integer('nrosolicitud')->default(0);
            $table->string('envioSolicitud',50)->default('pendiente')->nullable();
            $table->string('respuestaSolicitud',50)->default('pendiente')->nullable();
            $table->boolean('solEstado')->default('1')->nullable();

            $table->foreign('id_estudiante')->references('id')->on('estudiantes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_docente')->references('id')->on('docentes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_modalidad')->references('id')->on('modalidads')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicituds');
    }
};
