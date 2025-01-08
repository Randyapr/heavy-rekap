@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Pengeluaran Barang</h1>
</div>

<div class="container">
    <!-- Form Pencarian dan Filter -->
    <div class="row mb-3">
        <div class="col-md-4">
            <form action="{{ route('pengeluaran-barang.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                    placeholder="Cari nama/kode barang..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('pengeluaran-barang.index') }}" method="GET">
                <!-- Pertahankan parameter search jika ada -->
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <!-- Pertahankan parameter filter waktu jika ada -->
                @if(request('filter'))
                    <input type="hidden" name="filter" value="{{ request('filter') }}">
                @endif
                <select name="kategori" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach($kategoris as $kategori)
                        <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                            {{ $kategori }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-md-4">
            <form action="{{ route('pengeluaran-barang.index') }}" method="GET" id="filterForm">
                <!-- Pertahankan parameter search jika ada -->
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <!-- Pertahankan parameter kategori jika ada -->
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <select name="filter" class="form-select float-end" style="width: auto;" onchange="this.form.submit()">
                    <option value="">Semua Waktu</option>
                    <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                    <option value="quarter" {{ request('filter') == 'quarter' ? 'selected' : '' }}>3 Bulan</option>
                    <option value="half" {{ request('filter') == 'half' ? 'selected' : '' }}>6 Bulan</option>
                    <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>1 Tahun</option>
                </select>
            </form>
        </div>
    </div>

    <!-- Tabel Stok Tersedia -->
    <div class="card mb-4">
        <div class="card-header">
            <h5>Stok Barang Tersedia</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok Tersedia</th>
                            <th>Satuan</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pemasukanBarang as $item)
                            <tr>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->kategori_barang }}</td>
                                <td>{{ $item->stok_tersedia }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->lokasi_penyimpanan }}</td>
                                <td>
                                    <button type="button" 
                                            class="btn btn-primary btn-sm"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalPengeluaran"
                                            data-id="{{ $item->id }}"
                                            data-nama="{{ $item->nama_barang }}"
                                            data-stok="{{ $item->stok_tersedia }}"
                                            data-satuan="{{ $item->satuan }}"
                                            onclick="setModalData(this)">
                                        Keluarkan
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Riwayat Pengeluaran -->
    <div class="card">
        <div class="card-header">
            <h5>Riwayat Pengeluaran</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal Keluar</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Lokasi Tujuan</th>
                            <th>Penerima</th>
                            <th>Petugas</th>
                            @if(auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pengeluaranBarang as $item)
                            <tr>
                                <td>{{ $item->tanggal_pengeluaran->format('d/m/Y') }}</td>
                                <td>{{ $item->kode_barang }}</td>
                                <td>{{ $item->nama_barang }}</td>
                                <td>{{ $item->jumlah_dikeluarkan }}</td>
                                <td>{{ $item->satuan }}</td>
                                <td>{{ $item->lokasi_tujuan }}</td>
                                <td>{{ $item->nama_penerima }}</td>
                                <td>{{ $item->nama_petugas }}</td>
                                @if(auth()->user()->role === 'admin')
                                <td>
                                    <form action="{{ route('pengeluaran-barang.destroy', $item->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data pengeluaran</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $pengeluaranBarang->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Pengeluaran -->
<div class="modal fade" id="modalPengeluaran" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pengeluaran-barang.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Keluarkan Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pemasukan_id" id="pemasukan_id">
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="nama_barang" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Tersedia</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="stok_tersedia" readonly>
                            <span class="input-group-text" id="satuan_barang"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Dikeluarkan</label>
                        <input type="number" name="jumlah_dikeluarkan" class="form-control" required min="1">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Lokasi Tujuan</label>
                        <input type="text" name="lokasi_tujuan" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Penerima</label>
                        <input type="text" name="nama_penerima" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function setModalData(button) {
    const modal = document.getElementById('modalPengeluaran');
    const data = button.dataset;

    modal.querySelector('#pemasukan_id').value = data.id;
    modal.querySelector('#nama_barang').value = data.nama;
    modal.querySelector('#stok_tersedia').value = data.stok;
    modal.querySelector('#satuan_barang').textContent = data.satuan;
    
    const inputJumlah = modal.querySelector('input[name="jumlah_dikeluarkan"]');
    inputJumlah.max = data.stok;
    inputJumlah.value = '';
}
</script>
@endpush
@endsection