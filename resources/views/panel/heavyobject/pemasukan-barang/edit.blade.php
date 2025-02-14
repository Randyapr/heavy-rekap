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
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Supplier</label>
                            <select name="nama_supplier" class="form-select" required>
                                <option value="">Pilih Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->nama_supplier }}"
                                        {{ $pemasukan_barang->nama_supplier == $supplier->nama_supplier ? 'selected' : '' }}>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nomor PO</label>
                            <input type="text" name="nomor_po" class="form-control" required 
                                value="{{ old('nomor_po', $pemasukan_barang->nomor_po) }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Pilih Barang</label>
                            <select name="barang_id" class="form-select" required onchange="fillBarangData(this)">
                                <option value="">Pilih Barang</option>
                                @foreach($daftarBarang as $barang)
                                    <option value="{{ $barang->id }}"
                                        data-kode="{{ $barang->kode_barang }}"
                                        data-nama="{{ $barang->nama_barang }}"
                                        data-kategori="{{ $barang->kategori_barang }}"
                                        data-satuan="{{ $barang->satuan }}"
                                        {{ $pemasukan_barang->kode_barang == $barang->kode_barang ? 'selected' : '' }}>
                                        {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Hidden inputs -->
                <input type="hidden" name="kode_barang" id="kode_barang" value="{{ $pemasukan_barang->kode_barang }}">
                <input type="hidden" name="nama_barang" id="nama_barang" value="{{ $pemasukan_barang->nama_barang }}">
                <input type="hidden" name="kategori_barang" id="kategori_barang" value="{{ $pemasukan_barang->kategori_barang }}">
                <input type="hidden" name="satuan" id="satuan" value="{{ $pemasukan_barang->satuan }}">

                <div class="row">
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
                </div>

                <div class="row">
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
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Lokasi Penyimpanan</label>
                            <select name="lokasi_penyimpanan" class="form-select" required>
                                <option value="">Pilih Lokasi</option>
                                @foreach($lokasiGudangs as $lokasi)
                                    <option value="{{ $lokasi->nama_lokasi }}"
                                        {{ old('lokasi_penyimpanan', $pemasukan_barang->lokasi_penyimpanan) == $lokasi->nama_lokasi ? 'selected' : '' }}>
                                        {{ $lokasi->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lokasi_penyimpanan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
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

@push('scripts')
<script>
function fillBarangData(select) {
    const option = select.options[select.selectedIndex];
    if (option.value) {
        document.getElementById('kode_barang').value = option.dataset.kode;
        document.getElementById('nama_barang').value = option.dataset.nama;
        document.getElementById('kategori_barang').value = option.dataset.kategori;
        document.getElementById('satuan').value = option.dataset.satuan;
    }
}
</script>
@endpush

@endsection