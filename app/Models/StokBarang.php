<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model
{
    use HasFactory;

    protected $table = 'stok_barang';

    protected $fillable = [
        'barang_id',
        'jumlah_stok',
        'stok_minimum',
        'lokasi_penyimpanan',
        'keterangan'
    ];

    public function barang()
    {
        return $this->belongsTo(DaftarBarang::class, 'barang_id');
    }
}
