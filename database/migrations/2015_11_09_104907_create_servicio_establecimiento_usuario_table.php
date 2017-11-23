<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicioEstablecimientoUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        
        Schema::create('servicio_establecimiento_usuario', function(Blueprint $table) {
            
            $table->increments('id_servicio_est_us')->unique();
            $table->integer('id_usuario_servicio');
            $table->integer('id_servicio_est');
            $table->boolean('estado_servicio_est_us');
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
    }
}
