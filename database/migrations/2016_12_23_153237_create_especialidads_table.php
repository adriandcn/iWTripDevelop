<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEspecialidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialidads', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_usuario_servicio')->unsigned();
            $table->integer('id_catalogo_especialidad')->unsigned();
            $table->string('nombre_especialidad');
            $table->text('descripcion_especialidad');
            $table->boolean('activo');
            $table->timestamps();
        });
        
       Schema::table('especialidads', function(Blueprint $table) {
                    $table->foreign('id_usuario_servicio')->references('id')->on('usuario_servicios');
       });
       
       Schema::table('especialidads', function(Blueprint $table) {
                    $table->foreign('id_catalogo_especialidad')->references('id')->on('catalogo__especialidads');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('especialidads');
    }
}
