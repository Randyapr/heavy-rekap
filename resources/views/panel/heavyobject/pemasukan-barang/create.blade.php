@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Tambah Pemasukan Barang</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pemasukan-barang.store') }}" method="POST">
                @csrf
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Tanggal Penerimaan</label>
                            <input type="date" name="tanggal_penerimaan" class="form-control" required 
                                value="{{ old('tanggal_penerimaan') }}">
                            @error('tanggal_penerimaan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Supplier</label>
                            <select name="nama_supplier" class="form-select" required>
                                <option value="">Pilih Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->nama_supplier }}">
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
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
                                value="{{ old('nomor_po') }}">
                            @error('nomor_po')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                                        data-satuan="{{ $barang->satuan }}">
                                        {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                                    </option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Hidden inputs untuk data barang -->
                <input type="hidden" name="kode_barang" id="kode_barang">
                <input type="hidden" name="nama_barang" id="nama_barang">
                <input type="hidden" name="kategori_barang" id="kategori_barang">
                <input type="hidden" name="satuan" id="satuan">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Jumlah Diterima</label>
                            <input type="number" name="jumlah_diterima" class="form-control" required min="1">
                            @error('jumlah_diterima')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Kondisi Barang</label>
                            <select name="kondisi_barang" class="form-select" required>
                                <option value="">Pilih Kondisi</option>
                                <option value="baik" {{ old('kondisi_barang') == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ old('kondisi_barang') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="cacat" {{ old('kondisi_barang') == 'cacat' ? 'selected' : '' }}>Cacat</option>
                                <option value="segel" {{ old('kondisi_barang') == 'segel' ? 'selected' : '' }}>Segel</option>
                                <option value="fresh" {{ old('kondisi_barang') == 'fresh' ? 'selected' : '' }}>Fresh</option>
                                <option value="ex tele" {{ old('kondisi_barang') == 'ex tele' ? 'selected' : '' }}>Ex Tele</option>
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
                                @foreach($lokasiGudangs as $lokasi)
                                    <option value="{{ $lokasi->nama_lokasi }}">
                                        {{ $lokasi->nama_lokasi }}
                                    </option>
                                @endforeach
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
                                value="{{ old('nama_petugas') }}">
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
                            <select name="kategori_barang" class="form-select" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoriBarangs as $kategori)
                                    <option value="{{ $kategori->nama_kategori }}" 
                                        {{ old('kategori_barang') == $kategori->nama_kategori ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                    @error('note')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
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