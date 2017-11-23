<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportados', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario_servicio');
            $table->integer('tipo_error');
            $table->boolean('estado');
            $table->string('email');
            $table->string('nombre');
            $table->string('telefono');
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
        Schema::drop('reportados');
    }
}
