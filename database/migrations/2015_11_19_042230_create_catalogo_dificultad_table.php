<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoDificultadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    
        Schema::create('catalogo_dificultad', function(Blueprint $table) {
            
            $table->increments('id')->unique();
            

            //significa que el campo debe ser positivo
            
            $table->text('descripcion_dificultad');
            $table->string('nombre_dificultad');
            $table->boolean('estado_dificultad');
            $table->string('imagen_dificultad');
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
        Schema::drop('catalogo_dificultad');
    }
}
