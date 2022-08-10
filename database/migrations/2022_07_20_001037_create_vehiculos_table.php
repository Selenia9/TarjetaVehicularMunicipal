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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('n');
            $table->year('anio');
            $table->string('placa');
            $table->string('color');
            $table->string('chasis');
            $table->string('motor');
            $table->string('capacidad');
           $table->integer('asiento');
            $table->string('modelo');
            $table->string('marca');
            $table->string('tipoVehiculo');
            $table->string('combustible');
            $table->enum('rutaAutorizada',['MUNICIPALIDAD SACABA'])->default('MUNICIPALIDAD SACABA');
            $table->date('fechaInicio');
            $table->date('fechaFin');
         //llaves foranias
            $table->unsignedBigInteger('organizacion_id');
            $table->foreign('organizacion_id')->references('id')->on('organizaciones');
           $table->unsignedBigInteger('propietario_id');
            $table->foreign('propietario_id')->references('id')->on('propietarios');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vehiculos');
    }
};
