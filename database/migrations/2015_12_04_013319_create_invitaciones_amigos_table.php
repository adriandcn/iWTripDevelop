<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitacionesAmigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('invitaciones_amigos', function(Blueprint $table) {

            $table->increments('id')->unique();


            //significa que el campo debe ser positivo
            $table->string('id_usuario_invita');
            $table->string('invitacion_de');
            $table->string('invitacion_para');
            $table->boolean('estado_invitacion');
            $table->text('mensaje');
            $table->text('correo');
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
        //
        Schema::drop('invitaciones_amigos');
    }
}
