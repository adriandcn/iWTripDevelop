<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagoAuthorizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pago_authorizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_reserva')->unsigned;
            $table->string('nombreCalendario');
            $table->string('estadoPago');
            $table->string('fechaPago');
            $table->string('montoPago');
            $table->boolean('consumido');
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
        Schema::drop('pago_authorizes');
    }
}
