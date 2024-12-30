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
        'keterangan'
    ];

    public function stok()
    {
        return $this->hasOne(StokBarang::class, 'barang_id');
    }

    // Tambahkan relasi ke LokasiGudang
    public function lokasiGudang()
    {
        return $this->belongsTo(LokasiGudang::class, 'lokasi_penyimpanan', 'nama_lokasi');
    }

    public function kategoriBarang()
    {
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang', 'nama_kategori');
    }
}
