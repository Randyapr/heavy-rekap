<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarSupplier extends Model
{
    use HasFactory;

    protected $table = 'daftar_suppliers';

    // Mass assignable attributes
    protected $fillable = [
        'nama_supplier',
        'no_telp',
        'alamat',
        'barang_yang_dikirim',
        'catatan',
    ];
}
