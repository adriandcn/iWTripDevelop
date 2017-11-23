<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoServicioEstablecimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        
        Schema::create('catalogo_servicio_establecimiento', function(Blueprint $table) {
            
            $table->increments('id_servicio_est')->unique();
            $table->boolean('estado_servicio_est');
            $table->integer('id_catalogo_servicio');
            $table->string('nombre_servicio_est');

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
    }
}
