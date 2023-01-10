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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_carrera');
            $table->string('docNombre',80);
            $table->string('docPaterno',80);
            $table->string('docMaterno',80);
            $table->string('docCelular',50);
            $table->string('docGrado',80);
            $table->boolean('docEstado')->default(1);
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
        Schema::dropIfExists('docentes');
    }
};
