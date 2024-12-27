<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarBarang extends Model
{
    use HasFactory;

   //nya samikeun wee sareng daftar_barang
    protected $table = 'daftar_barang';

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'kategori_barang',
        'satuan',
        'lokasi_penyimpanan',
        'keterangan',
    ];
}
