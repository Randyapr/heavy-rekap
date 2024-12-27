<?php
// app/Models/PengeluaranBahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengeluaranBahan extends Model
{
    protected $table = 'pengeluaran_bahan';
    
    protected $fillable = [
        'tanggal_pengeluaran',
        'nama_barang',
        'kode_barang',
        'jumlah_dikeluarkan',
        'satuan',
        'lokasi_tujuan',
        'nama_penerima',
        'nama_petugas',
        'note'
    ];

    protected $dates = ['tanggal_pengeluaran'];
}
