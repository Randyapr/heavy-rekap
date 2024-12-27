@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Pengeluaran Barang</h1>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('pengeluaran-barang.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                    placeholder="Cari nama/kode barang..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="float-end">
                <select class="form-select" name="filter" onchange="this.form.submit()">
                    <option value="">Semua Waktu</option>
                    <option value="today" {{ request('filter') == 'today' ? 'selected' : '' }}>Hari Ini</option>
                    <option value="week" {{ request('filter') == 'week' ? 'selected' : '' }}>Minggu Ini</option>
                    <option value="month" {{ request('filter') == 'month' ? 'selected' : '' }}>Bulan Ini</option>
                </select>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="{{ route('pengeluaran-barang.create') }}" class="btn btn-primary mb-3">Tambah Pengeluaran</a>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
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
                        @forelse($pengeluaran_barang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_pengeluaran }}</td>
                            <td>{{ optional($item->barang)->nama_barang ?? 'N/A' }}</td>
                            <td>{{ optional($item->barang)->kode_barang ?? 'N/A' }}</td>
                            <td>{{ $item->jumlah_dikeluarkan }}</td>
                            <td>{{ optional($item->barang)->satuan ?? 'N/A' }}</td>
                            <td>{{ $item->lokasi_tujuan }}</td>
                            <td>{{ $item->nama_penerima }}</td>
                            <td>{{ $item->nama_petugas }}</td>
                            @if(auth()->user()->role === 'admin')
                            <td>
                                <a href="{{ route('pengeluaran-barang.edit', $item->id) }}" 
                                   class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pengeluaran-barang.destroy', $item->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" 
                                            onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ auth()->user()->role === 'admin' ? '10' : '9' }}" class="text-center">
                                Tidak ada data pengeluaran
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{ $pengeluaran_barang->links() }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto submit form when filter changes
    document.getElementById('filter-tanggal').addEventListener('change', function() {
        this.form.submit();
    });
</script>
@endpush