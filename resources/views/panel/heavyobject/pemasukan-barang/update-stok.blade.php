@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Update Stok Barang</h2>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Nama Barang</th>
                            <td>{{ $pemasukan_barang->nama_barang }}</td>
                        </tr>
                        <tr>
                            <th>Kode Barang</th>
                            <td>{{ $pemasukan_barang->kode_barang }}</td>
                        </tr>
                        <tr>
                            <th>Stok Saat Ini</th>
                            <td>{{ $pemasukan_barang->sisa_stok }} {{ $pemasukan_barang->satuan }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <form action="{{ route('pemasukan-barang.store-update-stok', $pemasukan_barang->id) }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Jumlah Penambahan Stok</label>
                            <input type="number" name="jumlah_tambah" class="form-control" required min="1">
                            @error('jumlah_tambah')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal_penerimaan" class="form-control" required 
                                value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Catatan</label>
                    <textarea name="note" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Stok</button>
                    <a href="{{ route('pemasukan-barang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 