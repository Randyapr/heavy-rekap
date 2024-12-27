<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('daftar_suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->string('no_telp')->nullable();
            $table->string('alamat');
            $table->string('barang_yang_dikirim');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daftar_suppliers');
    }
}
