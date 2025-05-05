<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoTable extends Migration
{
    public function up()
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->id('id_promo');
            $table->string('judul_promo');
            $table->text('deskripsi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('promo');
    }
}
