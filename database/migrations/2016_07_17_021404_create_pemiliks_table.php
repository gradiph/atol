<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemiliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemiliks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_users')->unsigned();
			$table->string('no_ktp',16);
			$table->string('no_hp',14);
			$table->string('alamat');
			$table->string('tempat_lahir',50);
			$table->date('tgl_lahir');
			$table->string('gambar_ktp');
			$table->enum('status',['Aktif','Menunggu','Non-Aktif'])->default('Menunggu');
			$table->string('token');
            $table->timestamps();
            $table->softDeletes();
			
			$table->foreign('id_users')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pemiliks');
    }
}
