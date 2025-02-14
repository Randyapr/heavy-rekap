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
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required value="{{ $supplier->no_telp }}">
                    @error('no_telp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $supplier->alamat }}</textarea>
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ $supplier->catatan }}</textarea>
                    @error('catatan')
                        <span class="text-danger">{{ $message }}</span>
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