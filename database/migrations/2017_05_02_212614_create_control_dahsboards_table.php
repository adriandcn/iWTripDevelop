<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateControlDahsboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_dahsboards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario_operador');
            $table->integer('catalogo_servicio');
            $table->integer('cantidad');
            $table->integer('estado');
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
        Schema::drop('control_dahsboards');
    }
}
