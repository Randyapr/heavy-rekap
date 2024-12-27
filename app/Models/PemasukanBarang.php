<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemasukanBarang extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_barang';

    protected $fillable = [
        'id_penerimaan',
        'tanggal_penerimaan',
        'nama_supplier',
        'nomor_po',
        'nama_barang',
        'kode_barang',
        'jumlah_diterima',
        'satuan',
        'kondisi_barang',
        'lokasi_penyimpanan',
        'nama_petugas',
        'note',
    ];
}
