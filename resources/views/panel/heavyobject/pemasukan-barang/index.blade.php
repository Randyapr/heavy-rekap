@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Data Pemasukan Barang</h1>


    <!-- Filter Section -->
    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('pemasukan-barang.index') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label>Kategori</label>
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Lokasi</label>
                    <select name="lokasi" class="form-select">
                        <option value="">Semua Lokasi</option>
                        @foreach($lokasis as $lokasi)
                            <option value="{{ $lokasi }}" {{ request('lokasi') == $lokasi ? 'selected' : '' }}>
                                {{ $lokasi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Filter Waktu</label>
                    <select name="filter" class="form-select">
                        <option value="">Semua Waktu</option>
                        <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                        <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                        <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                        <option value="year" {{ request('filter') == 'year' ? 'selected' : '' }}>Tahun Ini</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Cari</label>
                    <input type="text" name="search" class="form-control" placeholder="Cari..." 
                        value="{{ request('search') }}">
                </div>


                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('pemasukan-barang.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="{{ route('pemasukan-barang.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Tambah Pemasukan
            </a>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('pemasukan-barang.export', 'pdf') }}" class="btn btn-danger">
                <i class="bi bi-file-pdf"></i> Export PDF
            </a>
            <a href="{{ route('pemasukan-barang.export', 'excel') }}" class="btn btn-success">
                <i class="bi bi-file-excel"></i> Export Excel
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Supplier</th>
                    <th>No PO</th>
                    <th>Nama Barang</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Jumlah Masuk</th>
                    <th>Sisa Stok</th>
                    <th>Satuan</th>
                    <th>Kondisi</th>
                    <th>Lokasi</th>
                    <th>Petugas</th>
                    <th>Catatan</th>
                    @if(auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($pemasukan_barang as $key => $pemasukan)
                <tr>
                    <td>{{ $pemasukan_barang->firstItem() + $key }}</td>
                    <td>{{ $pemasukan->tanggal_penerimaan->format('d/m/Y') }}</td>
                    <td>{{ $pemasukan->nama_supplier }}</td>
                    <td>{{ $pemasukan->nomor_po }}</td>
                    <td>{{ $pemasukan->nama_barang }}</td>
                    <td>{{ $pemasukan->kode_barang }}</td>
                    <td>{{ $pemasukan->kategori_barang }}</td>
                    <td>{{ $pemasukan->jumlah_diterima }}</td>
                    <td>{{ $pemasukan->sisa_stok }}</td>
                    <td>{{ $pemasukan->satuan }}</td>
                    <td>{{ $pemasukan->kondisi_barang }}</td>
                    <td>{{ $pemasukan->lokasi_penyimpanan }}</td>
                    <td>{{ $pemasukan->nama_petugas }}</td>
                    <td>{{ $pemasukan->note ?? '-' }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('pemasukan-barang.edit', $pemasukan->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <a href="{{ route('pemasukan-barang.update-stok', $pemasukan->id) }}"
                                class="btn btn-info btn-sm">
                                <i class="bi bi-plus-circle"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal"
                                onclick="confirmDelete(
                                    {{ $pemasukan->id }}, 
                                    '{{ $pemasukan->nama_barang }}',
                                    '{{ route('pemasukan-barang.destroy', $pemasukan->id) }}'
                                )">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $pemasukan_barang->links() }}
</div>

<!-- Include Modal -->
@include('panel.components.delete-modal')

@push('scripts')
<script>
function confirmDelete(id, name, route) {
    document.getElementById('deleteItemName').textContent = name;
    document.getElementById('deleteForm').action = route;
}
</script>
@endpush
@endsection