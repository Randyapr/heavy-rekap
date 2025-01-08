@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Pemasukan Barang</h1>
</div>

<div class="container">
    <!-- Form Pencarian dan Filter -->
    <div class="row mb-3">
        <div class="col-md-3">
            <form action="{{ route('pemasukan-barang.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                    placeholder="Cari nama/kode barang..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-md-3">
            <form action="{{ route('pemasukan-barang.index') }}" method="GET">
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('lokasi'))
                <input type="hidden" name="lokasi" value="{{ request('lokasi') }}">
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
        <div class="col-md-3">
            <form action="{{ route('pemasukan-barang.index') }}" method="GET">
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                @if(request('kategori'))
                <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                <select name="lokasi" class="form-select" onchange="this.form.submit()">
                    <option value="">Semua Lokasi</option>
                    @foreach($lokasis as $lokasi)
                    <option value="{{ $lokasi }}" {{ request('lokasi') == $lokasi ? 'selected' : '' }}>
                        {{ $lokasi }}
                    </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-md-3">
            <form action="{{ route('pemasukan-barang.index') }}" method="GET" id="filterForm">
                @if(request('search'))
                <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
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

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- Tombol Tambih -->
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('pemasukan-barang.create') }}" class="btn btn-primary">Tambah Pemasukan Barang</a>

        <!-- Dropdown keur Export -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Export
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="{{ route('pemasukan-barang.export', ['type' => 'excel']) }}">Excel</a></li>
                <li><a class="dropdown-item" href="{{ route('pemasukan-barang.export', ['type' => 'pdf']) }}">PDF</a></li>
                <!-- <li><a class="dropdown-item" href="javascript:void(0);" onclick="window.print();">Print</a></li> -->
            </ul>
        </div>
    </div>

    <!-- Tabel -->
    <div class="card">

        <div class="table-responsive">

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Penerimaan</th>
                        <th>Nama Supplier</th>
                        <th>Nama Barang</th>
                        <th>Kode Barang</th>
                        <th>Kategori</th>
                        <th>Jumlah Diterima</th>
                        <th>Satuan</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemasukan_barang as $item)
                    <tr>
                        <td>{{ $item->tanggal_penerimaan_formatted }}</td>
                        <td>{{ $item->nama_supplier }}</td>
                        <td>{{ $item->nama_barang }}</td>
                        <td>{{ $item->kode_barang }}</td>
                        <td>{{ $item->kategori_barang }}</td>
                        <td>{{ $item->jumlah_diterima }}</td>
                        <td>{{ $item->satuan }}</td>
                        <td>{{ $item->kondisi_barang }}</td>
                        <td>{{ $item->lokasi_penyimpanan }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <button type="button"
                                    class="btn btn-success btn-sm"
                                    onclick="updateStok({{ json_encode($item) }})"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalUpdateStok">
                                    <i class="bi bi-plus-circle"></i>
                                </button>

                                @if(auth()->user()->role === 'admin')
                                <a href="{{ route('pemasukan-barang.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <button type="button"
                                    class="btn btn-danger btn-sm"
                                    onclick="confirmDelete({{ $item->id }}, '{{ $item->nama_barang }}')"
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <i class="bi bi-trash"></i>
                                </button>

                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $pemasukan_barang->appends(request()->query())->links() }}
        </div>
    </div>
</div>
</div>

<!-- Modal Update Stok -->
<div class="modal fade" id="modalUpdateStok" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pemasukan-barang.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Update Stok Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="jenis_input" value="tambah">

                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="modal_nama_barang" readonly>
                        <input type="hidden" name="nama_barang" id="input_nama_barang">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kode Barang</label>
                        <input type="text" class="form-control" id="modal_kode_barang" readonly>
                        <input type="hidden" name="kode_barang" id="input_kode_barang">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Stok Saat Ini</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="modal_stok_saat_ini" readonly>
                            <span class="input-group-text" id="modal_satuan"></span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Tambahan</label>
                        <input type="number" name="jumlah_diterima" class="form-control" required min="1">
                    </div>

                    <input type="hidden" name="kategori_barang" id="input_kategori">
                    <input type="hidden" name="satuan" id="input_satuan">
                    <input type="hidden" name="kondisi_barang" id="input_kondisi">
                    <input type="hidden" name="lokasi_penyimpanan" id="input_lokasi">

                    <div class="mb-3">
                        <label class="form-label">Tanggal Penerimaan</label>
                        <input type="date" name="tanggal_penerimaan" class="form-control" required value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor PO</label>
                        <input type="text" name="nomor_po" class="form-control" required>
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

<!-- Modal kangge Konfirmasi Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data <span id="barangName"></span>?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan</small></p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateStok(item) {
        // Set nilai ka form modal
        document.getElementById('modal_nama_barang').value = item.nama_barang;
        document.getElementById('modal_kode_barang').value = item.kode_barang;
        document.getElementById('modal_stok_saat_ini').value = item.jumlah_diterima;
        document.getElementById('modal_satuan').textContent = item.satuan;

        // Set nilai ka input hidden
        document.getElementById('input_nama_barang').value = item.nama_barang;
        document.getElementById('input_kode_barang').value = item.kode_barang;
        document.getElementById('input_kategori').value = item.kategori_barang;
        document.getElementById('input_satuan').value = item.satuan;
        document.getElementById('input_kondisi').value = item.kondisi_barang;
        document.getElementById('input_lokasi').value = item.lokasi_penyimpanan;
    }

    function confirmDelete(id, nama_barang) {
        // Setel didieu nama barang ka elemen modal
        document.getElementById('barangName').innerText = nama_barang;

        // Setel didieu ID barang ka URL atau aksi formulir kangge delete weh
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/pemasukan-barang/${id}`;

        // Tampilkan modal
        const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    document.querySelector('select[name="filter"]').addEventListener('change', function() {
        const searchValue = document.querySelector('input[name="search"]').value;
        if (searchValue) {
            document.querySelector('#filterForm input[name="search"]').value = searchValue;
        }
    });
    //upados tiasa nganggo datatable

    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endpush

@endsection