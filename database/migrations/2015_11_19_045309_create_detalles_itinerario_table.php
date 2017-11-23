<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallesItinerarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detalles_itinerario', function(Blueprint $table) {
            
            $table->increments('id')->unique();
            

            //significa que el campo debe ser positivo
            $table->integer('id_itinerario')->unsigned();
            
            $table->string('lugar_punto');
            $table->string('longitud_punto');
            $table->string('latitud_punto');
            $table->boolean('estado_punto');
            $table->string('diahora_punto');
            $table->string('descripcion_punto');
            $table->string('incluye_punto');
            $table->text('observaciones_punto');
            $table->string('tags_punto');
            


        });
        
        Schema::table('detalles_itinerario', function(Blueprint $table) {
			$table->foreign('id_itinerario')->references('id')->on('itinerarios_usuario_servicios');
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
        Schema::drop('detalles_itinerario');
    }
}
