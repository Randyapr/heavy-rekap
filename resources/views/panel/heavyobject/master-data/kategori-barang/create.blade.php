@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Tambah Kategori Barang</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('kategori-barang.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required 
                        value="{{ old('nama_kategori') }}">
                    @error('nama_kategori')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Keterangan (Opsional)</label>
                    <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('kategori-barang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 