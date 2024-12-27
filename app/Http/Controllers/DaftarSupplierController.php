<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarSupplier;

class DaftarSupplierController extends Controller
{
    public function index()
    {
        $suppliers = DaftarSupplier::all();
        return view('panel.heavyobject.master-data.daftar-suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('panel.heavyobject.master-data.daftar-suppliers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'barang_yang_dikirim' => 'required',
        ]);

        DaftarSupplier::create($request->all());
        return redirect()->route('daftar_suppliers.index')->with('success', 'Supplier berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $supplier = DaftarSupplier::findOrFail($id);
        return view('panel.heavyobject.master-data.daftar-suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'barang_yang_dikirim' => 'required',
        ]);

        $supplier = DaftarSupplier::findOrFail($id);
        $supplier->update($request->all());
        
        return redirect()->route('daftar_suppliers.index')->with('success', 'Supplier berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $supplier = DaftarSupplier::findOrFail($id);
        $supplier->delete();
        
        return redirect()->route('daftar_suppliers.index')->with('success', 'Supplier berhasil dihapus!');
    }
}
