@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Master Barang</h2>

    <form action="{{ route('daftar-barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required value="{{ $barang->nama_barang }}">
        </div>

        <div class="form-group mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required value="{{ $barang->kode_barang }}">
        </div>

        <div class="form-group mb-3">
            <label>Satuan</label>
            <select name="satuan" class="form-select" required>
                <option value="Pcs" {{ $barang->satuan == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Lembar" {{ $barang->satuan == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                <option value="Pack" {{ $barang->satuan == 'Pack' ? 'selected' : '' }}>Pack</option>
                <option value="Roll" {{ $barang->satuan == 'Roll' ? 'selected' : '' }}>Roll</option>
                <option value="Unit" {{ $barang->satuan == 'Unit' ? 'selected' : '' }}>Unit</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('daftar-barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection