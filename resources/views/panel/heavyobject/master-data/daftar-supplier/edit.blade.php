@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Supplier</h2>
    
    <div class="card">
        <div class="card-body">
            <form action="{{ route('daftar-supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group mb-3">
                    <label>Nama Supplier</label>
                    <select name="nama_supplier" class="form-control @error('nama_supplier') is-invalid @enderror" required>
                        @foreach($uniqueSuppliers as $nama)
                            <option value="{{ $nama }}" {{ $supplier->nama_supplier == $nama ? 'selected' : '' }}>
                                {{ $nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('nama_supplier')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror" 
                           value="{{ old('no_telp', $supplier->no_telp) }}" required>
                    @error('no_telp')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat', $supplier->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Barang yang Dikirim</label>
                    <select name="barang_yang_dikirim" class="form-control @error('barang_yang_dikirim') is-invalid @enderror" required>
                        @foreach($uniqueBarang as $barang)
                            <option value="{{ $barang }}" {{ $supplier->barang_yang_dikirim == $barang ? 'selected' : '' }}>
                                {{ $barang }}
                            </option>
                        @endforeach
                    </select>
                    @error('barang_yang_dikirim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror">{{ old('catatan', $supplier->catatan) }}</textarea>
                    @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('daftar-supplier.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 