@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Supplier</h1>
    
    <a href="{{ route('daftar-supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Barang yang Dikirim</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $key => $supplier)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->no_telp }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->barang_yang_dikirim }}</td>
                    <td>{{ $supplier->catatan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('daftar-supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('daftar-supplier.destroy', $supplier->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 