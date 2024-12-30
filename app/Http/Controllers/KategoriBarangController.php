<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use App\Models\DaftarBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Candak kategori unik tina daftar barang
        $kategoriBarangs = DaftarBarang::select('kategori_barang')
            ->distinct()
            ->get()
            ->map(function($item) {
                return [
                    'nama_kategori' => $item->kategori_barang,
                    'jumlah_barang' => DaftarBarang::where('kategori_barang', $item->kategori_barang)->count()
                ];
            });

        return view('panel.heavyobject.master-data.kategori-barang.index', compact('kategoriBarangs'));
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
        $kategori = KategoriBarang::findOrFail($id);
        return view('panel.heavyobject.master-data.kategori-barang.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|unique:kategori_barangs,nama_kategori,'.$id,
            'keterangan' => 'nullable'
        ]);

        $kategori = KategoriBarang::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori-barang.index')
            ->with('success', 'Kategori barang berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori-barang.index')
            ->with('success', 'Kategori barang berhasil dihapus!');
    }
}
