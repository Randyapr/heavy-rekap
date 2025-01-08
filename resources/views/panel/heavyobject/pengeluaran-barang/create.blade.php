@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h2>Tambah Pengeluaran Barang</h2>
</div>

<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('pengeluaran-barang.store') }}" method="POST">
                @csrf
                
                <div class="form-group mb-3">
                    <label>Pilih Barang dari Pemasukan</label>
                    <select name="pemasukan_id" class="form-select" required>
                        <option value="">Pilih Barang</option>
                        @foreach($pemasukanBarang as $item)
                            <option value="{{ $item->id }}" 
                                    data-nama="{{ $item->nama_barang }}"
                                    data-kode="{{ $item->kode_barang }}"
                                    data-stok="{{ $item->stok_tersedia }}"
                                    data-satuan="{{ $item->satuan }}"
                                    data-lokasi="{{ $item->lokasi_penyimpanan }}"
                                    data-tanggal="{{ $item->tanggal_penerimaan->format('d/m/Y') }}">
                                [{{ $item->tanggal_penerimaan->format('d/m/Y') }}] 
                                {{ $item->kode_barang }} - {{ $item->nama_barang }} 
                                (Stok: {{ $item->stok_tersedia }} {{ $item->satuan }})
                                [{{ $item->lokasi_penyimpanan }}]
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Jumlah Dikeluarkan</label>
                            <input type="number" name="jumlah_dikeluarkan" class="form-control" required min="1">
                            <small class="text-muted">
                                Stok tersedia: <span id="stok-tersedia">0</span> <span id="satuan"></span>
                                <br>
                                Dari pemasukan tanggal: <span id="tanggal-masuk">-</span>
                            </small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Lokasi Asal</label>
                            <input type="text" id="lokasi-asal" class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label>Lokasi Tujuan</label>
                    <input type="text" name="lokasi_tujuan" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Penerima</label>
                            <input type="text" name="nama_penerima" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label>Nama Petugas</label>
                            <input type="text" name="nama_petugas" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pengeluaran-barang.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.querySelector('select[name="pemasukan_id"]').addEventListener('change', function() {
    const option = this.options[this.selectedIndex];
    document.getElementById('stok-tersedia').textContent = option.dataset.stok;
    document.getElementById('satuan').textContent = option.dataset.satuan;
    document.getElementById('lokasi-asal').value = option.dataset.lokasi;
    document.getElementById('tanggal-masuk').textContent = option.dataset.tanggal;
    
    // Set max value untuk input jumlah
    const inputJumlah = document.querySelector('input[name="jumlah_dikeluarkan"]');
    inputJumlah.max = option.dataset.stok;
    inputJumlah.value = ''; // Reset nilai input
});
</script>
@endpush
@endsection