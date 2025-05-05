<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeranjangTable extends Migration
{
    public function up()
{
    Schema::create('keranjang', function (Blueprint $table) {
        $table->id('id_keranjang');
        $table->unsignedBigInteger('id_user');
        $table->unsignedBigInteger('id_produk');
        $table->integer('jumlah');
        $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
        $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}

