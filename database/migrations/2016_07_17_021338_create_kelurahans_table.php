<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelurahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelurahans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',30);
            $table->integer('id_kec')->unsigned();
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('id_kec')->references('id')->on('kecamatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kelurahans');
    }
}
