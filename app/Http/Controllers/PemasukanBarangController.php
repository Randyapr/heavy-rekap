<?php

namespace App\Http\Controllers;

use App\Models\PemasukanBarang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemasukanBarangController extends Controller
{
    public function index()
    {
        $pemasukan_barang = PemasukanBarang::all();
        return view('panel.heavyobject.pemasukan-barang.index', compact('pemasukan_barang'));
    }

    public function create()
    {
        return view('panel.heavyobject.pemasukan-barang.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
           'tanggal_penerimaan' => 'required|date',
            'nama_supplier' => 'required',
            'nomor_po' => 'required',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'jumlah_diterima' => 'required|integer',
            'satuan' => 'required',
            'kondisi_barang' => 'required',
            'lokasi_penyimpanan' => 'required',
            'nama_petugas' => 'required',
        ]);
        
        // Simpan data ke database
        PemasukanBarang::create($request->all());

        return redirect()->route('pemasukan-barang.index')->with('success', 'Barang berhasil ditambahkan!');
 }

    public function pemasukanBarang()
    {
        $pemasukan_barang = PemasukanBarang::all();
        return view('panel.heavyobject.pemasukan-barang.index', compact('pemasukan_barang'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pemasukan_barang = PemasukanBarang::findOrFail($id); // Mengambil data pemasukan barang berdasarkan ID
        return view('panel.heavyobject.pemasukan-barang.edit', compact('pemasukan_barang')); // Mengirimkan data ke view edit
    }
    
    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_penerimaan' => 'required',
            'nama_supplier' => 'required',
            'nomor_po' => 'required',
            'nama_barang' => 'required',
            'kode_barang' => 'required',
            'jumlah_diterima' => 'required|integer',
            'satuan' => 'required',
            'kondisi_barang' => 'required',
            'lokasi_penyimpanan' => 'required',
            'nama_petugas' => 'required',
            'note' => 'nullable',
        ]);

        $pemasukan_barang = PemasukanBarang::findOrFail($id);
        $pemasukan_barang->update($validated);

        return redirect()->route('pemasukan-barang.index')->with('success', 'Pemasukan Barang updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pemasukan_barang = PemasukanBarang::findOrFail($id);
        $pemasukan_barang->delete();

        return redirect()->route('pemasukan-barang.index')->with('success', 'Pemasukan Barang deleted successfully.');
    }
}
