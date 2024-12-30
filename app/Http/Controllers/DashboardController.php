<?php

namespace App\Http\Controllers;

use App\Models\PemasukanBarang;
use App\Models\PengeluaranBahan;
use App\Models\DaftarBarang;

class DashboardController extends Controller
{
    public function index()
    {
        // Ngetang total barang masuk
        $totalPemasukan = PemasukanBarang::sum('jumlah_diterima') ?? 0;
        
        // Ngetang total barang keluar
        $totalPengeluaran = PengeluaranBahan::sum('jumlah_dikeluarkan') ?? 0;
        
        // ngetang total stok saat ini
        $totalStok = $totalPemasukan - $totalPengeluaran;

        // Ngetang total kategori na saberiji
        $totalKategori = DaftarBarang::select('kategori_barang')
            ->distinct()
            ->count();

        return view('panel.dashboard', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'totalStok',
            'totalKategori'
        ));
    }
}
