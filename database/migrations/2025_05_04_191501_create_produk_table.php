<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
{
    Schema::create('produk', function (Blueprint $table) {
        $table->id('id_produk');
        $table->string('nama_produk');
        $table->decimal('harga');
        $table->integer('stok');
        $table->text('deskripsi')->nullable();
        // $table->string('gambar')->nullable();
        $table->unsignedBigInteger('id_kategori');
        $table->unsignedBigInteger('id_promo')->nullable(); // Tambahkan ini

        // Foreign keys
        $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        $table->foreign('id_promo')->references('id_promo')->on('promo')->onDelete('set null'); // Tambahkan ini juga
        $table->timestamps();

    });
}


    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
