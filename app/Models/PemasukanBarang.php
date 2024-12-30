<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class PemasukanBarang extends Model
{
    use HasFactory;

    protected $table = 'pemasukan_barang';

    protected $fillable = [
        'tanggal_penerimaan',
        'nama_supplier',
        'nama_barang',
        'kode_barang',
        'jumlah_diterima',
        'satuan',
        'kondisi_barang',
        'lokasi_penyimpanan',
        'nama_petugas',
        'note'
    ];

    public function getTanggalPenerimaanFormattedAttribute()
    {
        return Carbon::parse($this->tanggal_penerimaan)->format('d/m/Y');
    }
}
