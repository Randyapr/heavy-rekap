<?php

namespace App\Http\Controllers;

use App\Models\PemasukanBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DaftarBarang;
use Carbon\Carbon;
use App\Models\PengeluaranBahan;

class PemasukanBarangController extends Controller
{
    public function index(Request $request)
    {
        $query = PemasukanBarang::query();

        // Pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('kode_barang', 'like', "%{$search}%")
                  ->orWhere('kategori_barang', 'like', "%{$search}%");
            });
        }

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_barang', $request->kategori);
        }

        // Filter lokasi gudang
        if ($request->filled('lokasi')) {
            $query->where('lokasi_penyimpanan', $request->lokasi);
        }

        // Filter waktu
        if ($request->filled('filter')) {
            switch ($request->filter) {
                case 'today':
                    $query->whereDate('tanggal_penerimaan', Carbon::today());
                    break;
                case 'week':
                    $query->whereBetween('tanggal_penerimaan', [
                        Carbon::now()->startOfWeek(),
                        Carbon::now()->endOfWeek()
                    ]);
                    break;
                case 'month':
                    $query->whereMonth('tanggal_penerimaan', Carbon::now()->month)
                          ->whereYear('tanggal_penerimaan', Carbon::now()->year);
                    break;
                case 'quarter':
                    $query->whereBetween('tanggal_penerimaan', [
                        Carbon::now()->startOfQuarter(),
                        Carbon::now()->endOfQuarter()
                    ]);
                    break;
                case 'half':
                    $query->whereBetween('tanggal_penerimaan', [
                        Carbon::now()->subMonths(6),
                        Carbon::now()
                    ]);
                    break;
                case 'year':
                    $query->whereYear('tanggal_penerimaan', Carbon::now()->year);
                    break;
            }
        }

        $pemasukan_barang = $query->latest('tanggal_penerimaan')->paginate(10);
        
        // Ambil daftar kategori yang sudah ada untuk filter
        $kategoris = PemasukanBarang::select('kategori_barang')
            ->distinct()
            ->whereNotNull('kategori_barang')
            ->pluck('kategori_barang');

        // Ambil daftar lokasi untuk filter
        $lokasis = PemasukanBarang::select('lokasi_penyimpanan')
            ->distinct()
            ->whereNotNull('lokasi_penyimpanan')
            ->pluck('lokasi_penyimpanan');

        return view('panel.heavyobject.pemasukan-barang.index', 
            compact('pemasukan_barang', 'kategoris', 'lokasis'));
    }

    public function create()
    {
        return view('panel.heavyobject.pemasukan-barang.create');
    }

    // Tambahkan method baru untuk mengambil data barang sebelumnya
    public function getLastBarang(Request $request)
    {
        $kodeBarang = $request->kode_barang;
        
        // Hitung total stok
        $totalMasuk = PemasukanBarang::where('kode_barang', $kodeBarang)
            ->sum('jumlah_diterima');
        
        $totalKeluar = PengeluaranBahan::where('kode_barang', $kodeBarang)
            ->sum('jumlah_dikeluarkan');
        
        $stokTersedia = $totalMasuk - $totalKeluar;
        
        $lastBarang = PemasukanBarang::where('kode_barang', $kodeBarang)
            ->latest('tanggal_penerimaan')
            ->first();
            
        if ($lastBarang) {
            return response()->json([
                'success' => true,
                'data' => [
                    'nama_barang' => $lastBarang->nama_barang,
                    'kategori_barang' => $lastBarang->kategori_barang,
                    'satuan' => $lastBarang->satuan,
                    'nama_supplier' => $lastBarang->nama_supplier,
                    'kondisi_barang' => $lastBarang->kondisi_barang,
                    'lokasi_penyimpanan' => $lastBarang->lokasi_penyimpanan,
                    'stok_tersedia' => $stokTersedia
                ]
            ]);
        }
        
        return response()->json(['success' => false]);
    }

    // simpan menyimpan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal_penerimaan' => 'required|date',
            'nama_supplier' => 'required',
            'nomor_po' => 'required',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori_barang' => 'required',
            'jumlah_diterima' => 'required|numeric|min:1',
            'satuan' => 'required',
            'kondisi_barang' => 'required',
            'lokasi_penyimpanan' => 'required',
            'nama_petugas' => 'required',
            // 'jenis_input' => 'required|in:baru,tambah'
        ]);

        try {
            // if ($request->jenis_input === 'tambah') {
            //     // Validasi tambahan untuk update stok
            //     $existingBarang = PemasukanBarang::where('kode_barang', $request->kode_barang)
            //         ->where('kondisi_barang', $request->kondisi_barang)
            //         ->where('lokasi_penyimpanan', $request->lokasi_penyimpanan)
            //         ->latest('tanggal_penerimaan')
            //         ->first();

            //     if (!$existingBarang) {
            //         return back()
            //             ->withInput()
            //             ->with('error', 'Barang tidak ditemukan untuk update stok');
            //     }

            //     // Update stok
            //     $existingBarang->update([
            //         'jumlah_diterima' => $existingBarang->jumlah_diterima + $request->jumlah_diterima,
            //         'tanggal_penerimaan' => $request->tanggal_penerimaan,
            //         'nama_supplier' => $request->nama_supplier,
            //         'nomor_po' => $request->nomor_po,
            //         'nama_petugas' => $request->nama_petugas
            //     ]);

            //     return redirect()
            //         ->route('pemasukan-barang.index')
            //         ->with('success', "Stok berhasil ditambah: {$request->jumlah_diterima} {$existingBarang->satuan}");
            // }

            // Jika input baru
            PemasukanBarang::create($validated);
            
            return redirect()
                ->route('pemasukan-barang.index')
                ->with('success', 'Data pemasukan barang baru berhasil ditambahkan');

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function pemasukanBarang()
    {
        $pemasukan_barang = PemasukanBarang::all();
        return view('panel.heavyobject.pemasukan-barang.index', compact('pemasukan_barang'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pemasukan_barang = PemasukanBarang::findOrFail($id);
        return view('panel.heavyobject.pemasukan-barang.edit', compact('pemasukan_barang'));
    }
    
    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_penerimaan' => 'required|date',
            'nama_supplier' => 'required',
            'nomor_po' => 'required',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'kategori_barang' => 'required|string|max:255',
            'jumlah_diterima' => 'required|numeric|min:1',
            'satuan' => 'required|in:Pcs,Lembar,Pack,Roll,Unit',
            'kondisi_barang' => 'required|in:baik,rusak,cacat,segel,fresh,ex tele',
            'lokasi_penyimpanan' => 'required|in:Gudang Cirendang,Gudang Land',
            'nama_petugas' => 'required',
            'note' => 'nullable'
        ]);

        try {
            $pemasukan_barang = PemasukanBarang::findOrFail($id);

            // Cek apakah ada pengeluaran yang terkait
            $totalPengeluaran = $pemasukan_barang->pengeluaran()->sum('jumlah_dikeluarkan');
            
            if ($request->jumlah_diterima < $totalPengeluaran) {
                return back()
                    ->withInput()
                    ->with('error', "Tidak bisa mengubah jumlah diterima menjadi lebih kecil dari total pengeluaran ($totalPengeluaran)");
            }

            // Update menggunakan data yang sudah divalidasi
            $pemasukan_barang->update($validated);

            return redirect()
                ->route('pemasukan-barang.index')
                ->with('success', 'Data pemasukan barang berhasil diupdate');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pemasukan_barang = PemasukanBarang::findOrFail($id);
        $pemasukan_barang->delete();

        return redirect()->route('pemasukan-barang.index')->with('success', 'Pemasukan Barang deleted successfully.');
    }
}
