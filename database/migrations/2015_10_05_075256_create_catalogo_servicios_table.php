<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo_servicios', function(Blueprint $table) {
            
            $table->increments('id_catalogo_servicios')->unique();
            $table->boolean('estado_catalogo_servicios');
            $table->string('nombre_servicio');
            $table->string('descripcion_catalogo');
            $table->string('ejemplo_catalogo');
            $table->string('img_url_catalogo');
            
            
            $table->datetime('fecha_creacion_servicio');
            $table->datetime('fecha_fin_servicio');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogo_servicios');
    }
}
