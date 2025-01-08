@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Stok Barang</h1>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Total Masuk</th>
                    <th>Total Keluar</th>
                    <th>Stok Tersedia</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stokBarang as $stok)
                <tr>
                    <td>{{ $stok->kode_barang }}</td>
                    <td>{{ $stok->nama_barang }}</td>
                    <td>{{ $stok->total_masuk }}</td>
                    <td>{{ $stok->total_keluar }}</td>
                    <td>{{ $stok->stok_tersedia }}</td>
                    <td>{{ $stok->lokasi_penyimpanan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection