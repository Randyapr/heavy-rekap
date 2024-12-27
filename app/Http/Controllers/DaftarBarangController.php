<?php

namespace App\Http\Controllers;

use App\Models\DaftarBarang;
use Illuminate\Http\Request;

class DaftarBarangController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['admin'])->only(['edit', 'update', 'destroy']); 
    }

    public function index()
    {
        $barang = DaftarBarang::all();
        return view('panel.heavyobject.master-data.daftar-barang.index', compact('barang'));
    }

    public function create()
    {
        return view('panel.heavyobject.master-data.daftar-barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:daftar_barang',
            'kategori_barang' => 'required',
            'satuan' => 'required',
            'lokasi_penyimpanan' => 'required',
        ]);

        DaftarBarang::create($request->all());
        return redirect()->route('daftar-barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = DaftarBarang::findOrFail($id);
        return view('panel.heavyobject.master-data.daftar-barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kode_barang' => 'required|unique:daftar_barang,kode_barang,'.$id,
            'kategori_barang' => 'required',
            'satuan' => 'required',
            'lokasi_penyimpanan' => 'required',
        ]);

        $barang = DaftarBarang::findOrFail($id);
        $barang->update($request->all());
        return redirect()->route('daftar-barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = DaftarBarang::findOrFail($id);
        $barang->delete();
        return redirect()->route('daftar-barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
