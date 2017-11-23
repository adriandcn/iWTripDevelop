<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleEspecialidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle__especialidads', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('id_especialidad')->unsigned();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('hora_inicio');
            $table->string('hora_fin');
            $table->integer('numero_reservas');
            $table->integer('precio');
            $table->integer('descuento');
            $table->boolean('bookeable');
            $table->boolean('activo');
            $table->text('descripcion');
            $table->timestamps();
        });
        
        Schema::table('detalle__especialidads', function(Blueprint $table) {
                    $table->foreign('id_especialidad')->references('id')->on('especialidads');
       });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle__especialidads');
    }
}
