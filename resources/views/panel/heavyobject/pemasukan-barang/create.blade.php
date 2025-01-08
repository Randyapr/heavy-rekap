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
                            <label>Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" required 
                                value="{{ old('nama_supplier') }}">
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
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" required 
                                value="{{ old('nama_barang') }}">
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
                            <input type="text" name="kode_barang" id="kodeBarang" class="form-control" required 
                                value="{{ old('kode_barang') }}" onchange="getLastBarang(this.value)">
                            @error('kode_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Jumlah Diterima</label>
                            <input type="number" name="jumlah_diterima" class="form-control" required min="1" 
                                value="{{ old('jumlah_diterima') }}">
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
                                <option value="Pcs" {{ old('satuan') == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                                <option value="Lembar" {{ old('satuan') == 'Lembar' ? 'selected' : '' }}>Lembar</option>
                                <option value="Pack" {{ old('satuan') == 'Pack' ? 'selected' : '' }}>Pak</option>
                                <option value="Roll" {{ old('satuan') == 'Roll' ? 'selected' : '' }}>Roll</option>
                                <option value="Unit" {{ old('satuan') == 'Unit' ? 'selected' : '' }}>Unit</option>
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
                            <label>Kategori Barang</label>
                            <input type="text" name="kategori_barang" class="form-control" required 
                                value="{{ old('kategori_barang') }}" placeholder="Masukkan kategori barang">
                            @error('kategori_barang')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Lokasi Penyimpanan</label>
                            <select name="lokasi_penyimpanan" class="form-select" required>
                                <option value="">Pilih Lokasi</option>
                                <option value="Gudang Cirendang" {{ old('lokasi_penyimpanan') == 'Gudang Cirendang' ? 'selected' : '' }}>
                                    Gudang Cirendang
                                </option>
                                <option value="Gudang Land" {{ old('lokasi_penyimpanan') == 'Gudang Land' ? 'selected' : '' }}>
                                    Gudang Land
                                </option>
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
                                value="{{ old('nama_petugas') }}">
                            @error('nama_petugas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Catatan</label>
                    <textarea name="note" class="form-control" rows="3">{{ old('note') }}</textarea>
                    @error('note')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- teu kapake  -->

                <!-- <div class="form-group mb-3">
                    <label>Jenis Input</label>
                    <select name="jenis_input" class="form-select">
                        <option value="baru">Input Barang Baru</option>
                        <option value="tambah">Tambah Stok Barang Ada</option>
                    </select>
                </div> -->

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pemasukan-barang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>

<!-- @push('scripts')
<script>
function getLastBarang(kodeBarang) {
    if (!kodeBarang) return;
    
    fetch(`{{ route('pemasukan-barang.last-barang') }}?kode_barang=${kodeBarang}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Tampilkan modal konfirmasi
                Swal.fire({
                    title: 'Barang Sudah Ada',
                    text: "Apakah anda ingin menambah stok barang yang sudah ada?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, tambah stok',
                    cancelButtonText: 'Tidak, buat baru'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Auto-fill form dan set sebagai tambah stok
                        document.querySelector('input[name="nama_barang"]').value = data.data.nama_barang;
                        document.querySelector('input[name="kategori_barang"]').value = data.data.kategori_barang;
                        document.querySelector('select[name="satuan"]').value = data.data.satuan;
                        document.querySelector('input[name="nama_supplier"]').value = data.data.nama_supplier;
                        document.querySelector('select[name="kondisi_barang"]').value = data.data.kondisi_barang;
                        document.querySelector('select[name="lokasi_penyimpanan"]').value = data.data.lokasi_penyimpanan;
                        document.querySelector('input[name="is_tambah_stok"]').value = '1';
                    }
                });
            }
        });
}
</script>
@endpush
    </div>
</div> -->
@endsection