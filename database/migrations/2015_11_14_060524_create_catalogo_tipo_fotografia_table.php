<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoTipoFotografiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('catalogo_tipo_fotografia', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tipo')->unsigned();
		        $table->string('descripcion')->nullable();
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
        Schema::drop('catalogo_tipo_fotografia');
    }
}
