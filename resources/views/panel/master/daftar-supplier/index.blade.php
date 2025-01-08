@extends('panel.layouts.app')

@section('content')
<div class="pagetitle">
    <h1>Data Supplier</h1>
</div>

<div class="container">
    <!-- Form Pencarian -->
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('daftar-supplier.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" 
                    placeholder="Cari nama supplier..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tombol Tambah -->
    <a href="{{ route('daftar-supplier.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>

    <!-- Tabel -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama Supplier</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->nama_supplier }}</td>
                            <td>{{ $supplier->alamat }}</td>
                            <td>{{ $supplier->no_telp }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('daftar-supplier.edit', $supplier->id) }}" 
                                           class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>

                                        <form action="{{ route('daftar-supplier.destroy', $supplier->id) }}" 
                                              method="POST" 
                                              class="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                class="btn btn-danger btn-sm"
                                                onclick="confirmDelete(this)"
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
                {{ $suppliers->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data supplier ini?</p>
                <p class="text-danger"><small>Tindakan ini tidak dapat dibatalkan</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="executeDelete()">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentForm = null;

function confirmDelete(button) {
    currentForm = button.closest('.delete-form');
}

function executeDelete() {
    if (currentForm) {
        currentForm.submit();
    }
    
    // Tutup modal
    const modal = document.getElementById('deleteModal');
    const bsModal = bootstrap.Modal.getInstance(modal);
    if (bsModal) {
        bsModal.hide();
    }
}
</script>
@endpush

@endsection 