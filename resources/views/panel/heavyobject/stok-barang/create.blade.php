@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Stok Barang</h2>
    <form action="{{ route('stok-barang.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="barang_id">Pilih Barang</label>
            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" required>
                <option value="">Pilih Barang</option>
                @foreach($daftarBarang as $barang)
                    <option value="{{ $barang->id }}">
                        {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Jumlah Stok</label>
            <input type="number" name="jumlah_stok" class="form-control @error('jumlah_stok') is-invalid @enderror" required>
            @error('jumlah_stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok Minimum</label>
            <input type="number" name="stok_minimum" class="form-control @error('stok_minimum') is-invalid @enderror" required>
            @error('stok_minimum')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Lokasi Penyimpanan</label>
            <input type="text" name="lokasi_penyimpanan" class="form-control @error('lokasi_penyimpanan') is-invalid @enderror" required>
            @error('lokasi_penyimpanan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('stok-barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection