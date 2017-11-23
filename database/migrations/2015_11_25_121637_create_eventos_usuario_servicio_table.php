<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosUsuarioServicioTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //

        Schema::create('eventos_usuario_servicios', function(Blueprint $table) {

            $table->increments('id')->unique();


            //significa que el campo debe ser positivo
            $table->integer('id_usuario_servicio')->unsigned();
            $table->integer('id_fotografia')->unsigned();
            $table->string('nombre_evento');
            $table->text('descripcion_evento');
            $table->text('observaciones_evento');
            $table->boolean('estado_evento');
            $table->datetime('fecha_desde');
            $table->datetime('fecha_hasta');
            $table->string('longitud_evento');
            $table->string('latitud_evento');
            $table->text('tags');
            $table->timestamps();
        });

        Schema::table('eventos_usuario_servicios', function(Blueprint $table) {
            $table->foreign('id_usuario_servicio')->references('id')->on('usuario_servicios');
        });

        Schema::table('eventos_usuario_servicios', function(Blueprint $table) {
            $table->foreign('id_fotografia')->references('id')->on('catalogo_tipo_fotografia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop('eventos_usuario_servicios');
    }

}
