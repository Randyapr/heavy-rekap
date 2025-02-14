@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Tambah Supplier</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('daftar-supplier.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Nama Supplier</label>
                    <input type="text" name="nama_supplier" class="form-control" required 
                        value="{{ old('nama_supplier') }}">
                    @error('nama_supplier')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>No Telp</label>
                    <input type="text" name="no_telp" class="form-control" required 
                        value="{{ old('no_telp') }}">
                    @error('no_telp')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ old('catatan') }}</textarea>
                    @error('catatan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('daftar-supplier.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 