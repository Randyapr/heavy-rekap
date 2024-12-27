@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengeluaran Barang</h1>
    
    <form action="{{ route('pengeluaran-barang.store') }}" method="POST">
        @csrf
        
        <div class="form-group mb-3">
            <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
            <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
        </div>

        <div class="form-group mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" class="form-control" id="kode_barang" name="kode_barang" required>
        </div>

        <div class="form-group mb-3">
            <label for="jumlah_dikeluarkan">Jumlah</label>
            <input type="number" class="form-control" id="jumlah_dikeluarkan" name="jumlah_dikeluarkan" required>
        </div>

        <div class="form-group mb-3">
            <label for="satuan">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" required>
        </div>

        <div class="form-group mb-3">
            <label for="lokasi_tujuan">Lokasi Tujuan</label>
            <input type="text" class="form-control" id="lokasi_tujuan" name="lokasi_tujuan" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" required>
        </div>

        <div class="form-group mb-3">
            <label for="nama_petugas">Nama Petugas</label>
            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" required>
        </div>

        <div class="form-group mb-3">
            <label for="note">Catatan</label>
            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengeluaran-barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection