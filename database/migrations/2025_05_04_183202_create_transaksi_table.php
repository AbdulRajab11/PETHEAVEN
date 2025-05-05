<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateTransaksiTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_petugas')->nullable();
            $table->dateTime('tanggal');
            $table->decimal('total_harga', 12, 2);
            $table->enum('status', ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan']);
            $table->enum('metode_pembayaran', ['Transfer', 'COD', 'QRIS']);
            $table->text('alamat_pengiriman');
            $table->text('catatan')->nullable();
            $table->foreign('id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->foreign('id_petugas')->references('id_user')->on('user')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
