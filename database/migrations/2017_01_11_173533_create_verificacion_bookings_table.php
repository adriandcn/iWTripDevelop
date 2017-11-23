<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerificacionBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_abcalendar_verificacion_bookings', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_usuario')->unsigned;
            $table->integer('id_usuario_servicio')->unsigned;
            $table->boolean('consumido');
            $table->string('uuid');
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
        Schema::drop('booking_abcalendar_verificacion_bookings');
    }
}
