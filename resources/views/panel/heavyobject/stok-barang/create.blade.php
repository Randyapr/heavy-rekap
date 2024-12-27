@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Stok Barang</h1>
    
    <form action="{{ route('stok-barang.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="barang_id">Pilih Barang</label>
            <select class="form-control @error('barang_id') is-invalid @enderror" 
                id="barang_id" name="barang_id" required>
                <option value="">Pilih Barang</option>
                @foreach($daftarBarang as $barang)
                    <option value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>
                        {{ $barang->nama_barang }} - {{ $barang->kode_barang }}
                    </option>
                @endforeach
            </select>
            @error('barang_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_stok">Jumlah Stok</label>
            <input type="number" class="form-control @error('jumlah_stok') is-invalid @enderror" 
                id="jumlah_stok" name="jumlah_stok" value="{{ old('jumlah_stok') }}" required>
            @error('jumlah_stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="stok_minimum">Stok Minimum</label>
            <input type="number" class="form-control @error('stok_minimum') is-invalid @enderror" 
                id="stok_minimum" name="stok_minimum" value="{{ old('stok_minimum') }}" required>
            @error('stok_minimum')
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

        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control @error('keterangan') is-invalid @enderror" 
                id="keterangan" name="keterangan" rows="3">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('stok-barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

@push('scripts')
<script>
    // Jika diperlukan, tambahkan JavaScript untuk validasi tambahan atau dynamic select
    $(document).ready(function() {
        $('#barang_id').select2({
            placeholder: "Pilih Barang",
            allowClear: true
        });
    });
</script>
@endpush