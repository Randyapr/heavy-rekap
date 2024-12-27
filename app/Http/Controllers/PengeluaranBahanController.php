<?php

namespace App\Http\Controllers;

use App\Models\PengeluaranBahan;
use App\Models\DaftarBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Pengeluaran Bahan naon anjenggg

class PengeluaranBahanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $pengeluaran_barang = PengeluaranBahan::latest()->paginate(15);
        return view('panel.heavyobject.pengeluaran-barang.index', compact('pengeluaran_barang'));
    }

    public function create()
    {
        $daftarBarang = DaftarBarang::all();
        return view('panel.heavyobject.pengeluaran-barang.create', compact('daftarBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'jumlah_dikeluarkan' => 'required|numeric|min:1',
            'satuan' => 'required',
            'lokasi_tujuan' => 'required',
            'nama_penerima' => 'required',
            'nama_petugas' => 'required'
        ]);

        PengeluaranBahan::create($request->all());
        return redirect()->route('pengeluaran-barang.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('pengeluaran-barang.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengedit data.');
        }

        $bahan = PengeluaranBahan::findOrFail($id);
        return view('panel.heavyobject.pengeluaran-barang.edit', compact('bahan'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('pengeluaran-barang.index')
                ->with('error', 'Anda tidak memiliki akses untuk mengupdate data.');
        }

        $request->validate([
            'tanggal_pengeluaran' => 'required|date',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'jumlah_dikeluarkan' => 'required|numeric|min:1',
            'satuan' => 'required',
            'lokasi_tujuan' => 'required',
            'nama_penerima' => 'required',
            'nama_petugas' => 'required'
        ]);

        $bahan = PengeluaranBahan::findOrFail($id);
        $bahan->update($request->all());

        return redirect()->route('pengeluaran-barang.index')
            ->with('success', 'Data pengeluaran berhasil diupdate!');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('pengeluaran-barang.index')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        $bahan = PengeluaranBahan::findOrFail($id);
        $bahan->delete();

        return redirect()->route('pengeluaran-barang.index')
            ->with('success', 'Data pengeluaran berhasil dihapus!');
    }
}