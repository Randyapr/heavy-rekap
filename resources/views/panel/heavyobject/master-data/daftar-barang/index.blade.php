@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Barang</h1>
    
    // tambihan role anyinggg
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('daftar-barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    @endif
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Satuan</th>
                <th>Lokasi</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->kategori_barang }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->lokasi_penyimpanan }}</td>
                @if(auth()->user()->role === 'admin')
                <td>
                    <a href="{{ route('daftar-barang.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('daftar-barang.destroy', $item->id) }}" method="POST" style="display:inline;">
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