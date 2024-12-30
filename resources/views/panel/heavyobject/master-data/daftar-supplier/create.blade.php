@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Supplier</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('daftar-supplier.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Nama Supplier</label>
                    <select name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" required>
                        <option value="">Pilih Supplier</option>
                        @foreach($uniqueSuppliers as $supplier)
                            <option value="{{ $supplier }}">{{ $supplier }}</option>
                        @endforeach
                    </select>
                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" required>
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required></textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Barang yang Dikirim</label>
                    <select name="barang_yang_dikirim" class="form-control @error('barang_yang_dikirim') is-invalid @enderror" required>
                        <option value="">Pilih Barang</option>
                        @foreach($uniqueBarang as $barang)
                            <option value="{{ $barang }}">{{ $barang }}</option>
                        @endforeach
                    </select>
                    @error('barang_yang_dikirim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror"></textarea>
                    @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('daftar-supplier.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 