<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsahasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usahas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('id_pemilik')->unsigned();
            $table->string('nama');
			$table->string('alamat');
			$table->double('lat',15,6);
			$table->double('lng',15,6);
            $table->string('telepon',14);
			$table->string('produk_unggulan');
			$table->string('deskripsi');
			$table->string('gambar_foto');
			$table->integer('id_skala')->unsigned();
			$table->integer('id_sektor')->unsigned();
			$table->integer('id_kel')->unsigned();
			$table->enum('status',['Aktif','Menunggu','Non-Aktif'])->default('Menunggu');
            $table->timestamps();
			$table->softDeletes();
			
			$table->foreign('id_pemilik')->references('id')->on('pemiliks');
			$table->foreign('id_skala')->references('id')->on('skalas');
			$table->foreign('id_sektor')->references('id')->on('sektors');
			$table->foreign('id_kel')->references('id')->on('kelurahans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('usahas');
    }
}
