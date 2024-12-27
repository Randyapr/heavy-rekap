@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Stok Barang</h1>
    
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('stok-barang.create') }}" class="btn btn-primary mb-3">Tambah Stok Barang</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Jumlah Stok</th>
                <th>Stok Minimum</th>
                <th>Lokasi Penyimpanan</th>
                <th>Keterangan</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($stokBarang as $stok)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $stok->barang->nama_barang }}</td>
                <td>{{ $stok->barang->kode_barang }}</td>
                <td>{{ $stok->jumlah_stok }}</td>
                <td>{{ $stok->stok_minimum }}</td>
                <td>{{ $stok->lokasi_penyimpanan }}</td>
                <td>{{ $stok->keterangan }}</td>
                @if(auth()->user()->role === 'admin')
                <td>
                    <a href="{{ route('stok-barang.edit', $stok->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('stok-barang.destroy', $stok->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection