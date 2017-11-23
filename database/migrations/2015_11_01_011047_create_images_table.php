<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
         Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
			$table->string('filename', 530);
			$table->string('original_name',530);
			$table->string('password', 60);
			$table->integer('user_id')->unsigned();
			
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
         Schema::drop('images');
    }
}
