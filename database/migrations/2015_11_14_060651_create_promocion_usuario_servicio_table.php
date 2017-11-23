<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionUsuarioServicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
         Schema::create('promocion_usuario_servicio', function(Blueprint $table) {
            
            $table->increments('id')->unique();
            

            //significa que el campo debe ser positivo
            $table->integer('id_usuario_servicio')->unsigned();
            $table->integer('id_catalogo_tipo_fotografia');
            $table->text('descripcion_promocion');
            $table->string('nombre_promocion');
            $table->boolean('estado_promocion');
            $table->datetime('fecha_desde');
            $table->datetime('fecha_hasta');
            $table->text('tags');
            $table->float('precio_normal');
            $table->float('descuento');
            $table->string('codigo_promocion');
            $table->text('observaciones_promocion');
            


        });
        
           Schema::table('promocion_usuario_servicio', function(Blueprint $table) {
			$table->foreign('id_usuario_servicio')->references('id')->on('usuario_servicios');
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
        Schema::drop('promocion_usuario_servicio');
    }
}
