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
        Schema::create('programacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_estudiante');
            $table->string('nroPanel', 80);
            $table->time('horaDefensa')->nullable();
            $table->string('fechaDefensa',50)->nullable();
            $table->string('fechaProgramacion');
            $table->integer('notaDefensa')->default(0);
            $table->string('correcion')->default('ninguno');
            $table->string('proEstado')->default('pendiente');
            $table->string('fechaH')->nullable();
            $table->string('correciones')->nullable();
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
        Schema::dropIfExists('programacions');
    }
};
