<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItinerariosUsuarioServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
        
         Schema::create('itinerarios_usuario_servicios', function(Blueprint $table) {
            
            $table->increments('id')->unique();
            

            //significa que el campo debe ser positivo
            $table->integer('id_usuario_servicio')->unsigned();
            $table->integer('id_catalogo_dificultad')->unsigned();
            $table->integer('id_fotografia')->unsigned();
            $table->text('descripcion_itinerario');
            $table->string('nombre_itinerario');
            $table->string('provincia_itinerario');
            $table->boolean('estado_itinerario');
            $table->datetime('fecha_desde');
            $table->datetime('fecha_hasta');
            $table->text('tags');
            $table->float('precio_normal');
            $table->float('descuento');
            
            $table->text('observaciones_itinerario');
            
            


        });
        
           Schema::table('itinerarios_usuario_servicios', function(Blueprint $table) {
			$table->foreign('id_usuario_servicio')->references('id')->on('usuario_servicios');
                        });
                        
                        Schema::table('itinerarios_usuario_servicios', function(Blueprint $table) {
			$table->foreign('id_catalogo_dificultad')->references('id')->on('catalogo_dificultad');
                        });
                        Schema::table('itinerarios_usuario_servicios', function(Blueprint $table) {
			$table->foreign('id_fotografia')->references('id')->on('catalogo_tipo_fotografia');
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
        Schema::drop('itinerarios_usuario_servicios');
    }
}
