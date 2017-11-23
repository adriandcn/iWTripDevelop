<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioOperadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_operadores', function(Blueprint $table) {
            
            $table->increments('id_usuario_op')->unique();
            $table->string('nombre_empresa_operador');
            $table->string('password_operador');
            $table->boolean('reset_password_operador');
            $table->string('nombre_contacto_operador_1');
            $table->string('telf_contacto_operador_1');
            $table->string('telf_contacto_operador_2');
            $table->string('nombre_contacto_operador_2');
            $table->string('email_contacto_operador');
            $table->boolean('estado_contacto_operador');
            $table->string('ip_registro_operador');
            $table->integer('id_tipo_operador');
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
        Schema::drop('usuario_operadores');
    }
}
