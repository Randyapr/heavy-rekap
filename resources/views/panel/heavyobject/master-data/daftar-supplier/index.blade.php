@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Supplier</h1>

    <a href="{{ route('daftar-supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>No Telp</th>
                    <th>Alamat</th>
                    <th>Barang yang Dikirim</th>
                    <th>Catatan</th>
                    @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($suppliers as $key => $supplier)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->no_telp }}</td>
                    <td>{{ $supplier->alamat }}</td>
                    <td>{{ $supplier->barang_yang_dikirim }}</td>
                    <td>{{ $supplier->catatan ?? '-' }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('daftar-supplier.edit', $supplier->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <button type="button"
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal"
                                onclick="setDeleteData({{ $supplier->id }}, '{{ $supplier->nama_supplier }}')">
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
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data supplier <span id="supplierName"></span>?</p>
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
function setDeleteData(id, name) {
    const form = document.getElementById('deleteForm');
    form.action = `{{ url('daftar-supplier') }}/${id}`;
    
    // Set didieu nama supplier di modal
    document.getElementById('supplierName').textContent = name;
}
</script>
@endpush

@endsection