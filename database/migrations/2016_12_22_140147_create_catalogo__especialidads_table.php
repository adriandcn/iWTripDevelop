<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoEspecialidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogo__especialidads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_catalogo_servicio')->unsigned();
            $table->string('nombre');
            $table->text('descripcion');
            $table->boolean('activo');
            $table->timestamps();
        });
        
       Schema::table('catalogo__especialidads', function(Blueprint $table) {
                    $table->foreign('id_catalogo_servicio')->references('id_catalogo_servicios')->on('catalogo_servicios');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('catalogo__especialidads');
    }
}
