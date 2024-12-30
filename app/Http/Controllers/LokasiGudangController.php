<?php

namespace App\Http\Controllers;

use App\Models\LokasiGudang;
use App\Models\DaftarBarang;
use Illuminate\Http\Request;

class LokasiGudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Candak lokasi unik ti daftar barang
        $lokasiGudangs = DaftarBarang::select('lokasi_penyimpanan')
            ->distinct()
            ->get()
            ->map(function($item) {
                return [
                    'nama_lokasi' => $item->lokasi_penyimpanan,
                    'jumlah_barang' => DaftarBarang::where('lokasi_penyimpanan', $item->lokasi_penyimpanan)->count()
                ];
            });

        return view('panel.heavyobject.master-data.lokasi-gudang.index', compact('lokasiGudangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lokasi = LokasiGudang::findOrFail($id);
        return view('panel.heavyobject.master-data.lokasi-gudang.edit', compact('lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lokasi' => 'required|unique:lokasi_gudangs,nama_lokasi,'.$id,
            'keterangan' => 'nullable'
        ]);

        $lokasi = LokasiGudang::findOrFail($id);
        $lokasi->update($request->all());

        return redirect()->route('lokasi-gudang.index')
            ->with('success', 'Lokasi gudang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = LokasiGudang::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('lokasi-gudang.index')
            ->with('success', 'Lokasi gudang berhasil dihapus!');
    }
}
