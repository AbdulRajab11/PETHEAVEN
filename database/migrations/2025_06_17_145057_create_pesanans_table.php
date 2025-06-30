<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_transaksi')->nullable(); // foreign key ke transaksi
            $table->integer('jumlah');
            $table->string('alamat_pengiriman');
            $table->decimal('total_harga', 10, 2);
            $table->string('status')->default('Menunggu Konfirmasi');
            $table->timestamps();

            // foreign key ke tabel user pakai id_user
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');

            // foreign key ke tabel produk pakai id_produk
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
