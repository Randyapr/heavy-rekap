<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('daftar_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('kode_barang')->unique();
            $table->string('kategori_barang');
            $table->string('satuan');
            $table->string('lokasi_penyimpanan');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_barang');
    }
}; 