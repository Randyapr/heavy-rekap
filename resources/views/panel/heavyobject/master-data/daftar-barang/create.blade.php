@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Daftar Barang</h1>
    
    <form action="{{ route('daftar-barang.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" 
                id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
            @error('nama_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" 
                id="kode_barang" name="kode_barang" value="{{ old('kode_barang') }}" required>
            @error('kode_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="kategori_barang">Kategori Barang</label>
            <input type="text" class="form-control @error('kategori_barang') is-invalid @enderror" 
                id="kategori_barang" name="kategori_barang" value="{{ old('kategori_barang') }}" required>
            @error('kategori_barang')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="satuan">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror" 
                id="satuan" name="satuan" value="{{ old('satuan') }}" required>
            @error('satuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
            <input type="text" class="form-control @error('lokasi_penyimpanan') is-invalid @enderror" 
                id="lokasi_penyimpanan" name="lokasi_penyimpanan" value="{{ old('lokasi_penyimpanan') }}" required>
            @error('lokasi_penyimpanan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('daftar-barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection