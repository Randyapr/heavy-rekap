<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarSupplier;
use App\Models\PemasukanBarang;

class DaftarSupplierController extends Controller
{
    public function index()
    {
        $suppliers = DaftarSupplier::all();
        return view('panel.heavyobject.master-data.daftar-supplier.index', compact('suppliers'));
    }

    public function create()
    {
        $uniqueSuppliers = PemasukanBarang::distinct()->pluck('nama_supplier');
        $uniqueBarang = PemasukanBarang::distinct()->pluck('nama_barang');
        
        return view('panel.heavyobject.master-data.daftar-supplier.create', compact('uniqueSuppliers', 'uniqueBarang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'barang_yang_dikirim' => 'required',
            'catatan' => 'nullable'
        ]);

        DaftarSupplier::create($request->all());
        return redirect()->route('daftar-supplier.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $supplier = DaftarSupplier::findOrFail($id);
        $uniqueSuppliers = PemasukanBarang::distinct()->pluck('nama_supplier');
        $uniqueBarang = PemasukanBarang::distinct()->pluck('nama_barang');
        
        return view('panel.heavyobject.master-data.daftar-supplier.edit', 
            compact('supplier', 'uniqueSuppliers', 'uniqueBarang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'barang_yang_dikirim' => 'required',
            'catatan' => 'nullable'
        ]);

        $supplier = DaftarSupplier::findOrFail($id);
        $supplier->update($request->all());
        
        return redirect()->route('daftar-supplier.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $supplier = DaftarSupplier::findOrFail($id);
        $supplier->delete();
        
        return redirect()->route('daftar-supplier.index')->with('success', 'Supplier berhasil dihapus!');
    }
}
