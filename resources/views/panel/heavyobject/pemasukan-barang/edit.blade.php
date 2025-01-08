@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Edit Pemasukan Barang</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemasukan-barang.update', $pemasukan_barang->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Tanggal Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" class="form-control" required 
                                value="{{ old('tanggal_penerimaan', $pemasukan_barang->tanggal_penerimaan->format('Y-m-d')) }}">
                            @error('tanggal_penerimaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" required 
                                value="{{ old('nama_supplier', $pemasukan_barang->nama_supplier) }}">
                            @error('nama_supplier')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nomor PO</label>
                            <input type="text" name="nomor_po" class="form-control" required 
                                value="{{ old('nomor_po', $pemasukan_barang->nomor_po) }}">
                            @error('nomor_po')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required 
                                value="{{ old('nama_barang', $pemasukan_barang->nama_barang) }}">
                            @error('nama_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Kode Barang</label>
                            <input type="text" name="kode_barang" class="form-control" required 
                                value="{{ old('kode_barang', $pemasukan_barang->kode_barang) }}">
                            @error('kode_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Jumlah Diterima</label>
                            <input type="number" name="jumlah_diterima" class="form-control" required min="1" 
                                value="{{ old('jumlah_diterima', $pemasukan_barang->jumlah_diterima) }}">
                            @error('jumlah_diterima')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Satuan</label>
                            <select name="satuan" class="form-select" required>
                                <option value="">Pilih Satuan</option>
                                <option value="Pcs" {{ $pemasukan_barang->satuan == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                                <option value="Lembar" {{ $pemasukan_barang->satuan == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                                <option value="Pack" {{ $pemasukan_barang->satuan == 'Pack' ? 'selected' : '' }}>Pack</option>
                                <option value="Roll" {{ $pemasukan_barang->satuan == 'Roll' ? 'selected' : '' }}>Roll</option>
                                <option value="Unit" {{ $pemasukan_barang->satuan == 'Unit' ? 'selected' : '' }}>Unit</option>
                            </select>
                            @error('satuan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Kondisi Barang</label>
                            <select name="kondisi_barang" class="form-select" required>
                                <option value="">Pilih Kondisi</option>
                                @foreach(['baik', 'rusak', 'cacat', 'segel', 'fresh', 'ex tele'] as $kondisi)
                                    <option value="{{ $kondisi }}" 
                                        {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == $kondisi ? 'selected' : '' }}>
                                        {{ ucfirst($kondisi) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kondisi_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Lokasi Penyimpanan</label>
                            <select name="lokasi_penyimpanan" class="form-select" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Gudang Cirendang" 
                                    {{ old('lokasi_penyimpanan', $pemasukan_barang->lokasi_penyimpanan) == 'Gudang Cirendang' ? 'selected' : '' }}>
                                    Gudang Cirendang
                                </option>
                                <option value="Gudang Land"
                                    {{ old('lokasi_penyimpanan', $pemasukan_barang->lokasi_penyimpanan) == 'Gudang Land' ? 'selected' : '' }}>
                                    Gudang Land
                                </option>
                            </select>
                            @error('lokasi_penyimpanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" required 
                                value="{{ old('nama_petugas', $pemasukan_barang->nama_petugas) }}">
                            @error('nama_petugas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Kategori Barang</label>
                            <input type="text" name="kategori_barang" class="form-control" required 
                                value="{{ old('kategori_barang', $pemasukan_barang->kategori_barang) }}" 
                                placeholder="Masukkan kategori barang">
                            @error('kategori_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Catatan</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note', $pemasukan_barang->note) }}</textarea>
                    @error('note')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('pemasukan-barang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection