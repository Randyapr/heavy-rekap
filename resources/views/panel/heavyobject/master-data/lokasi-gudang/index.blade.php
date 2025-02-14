@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Data Lokasi Gudang</h1>

    <a href="{{ route('lokasi-gudang.create') }}" class="btn btn-primary mb-3">Tambah Lokasi</a>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Keterangan</th>
                    @if(auth()->user()->role === 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($lokasiGudangs as $key => $lokasi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $lokasi->nama_lokasi }}</td>
                    <td>{{ $lokasi->keterangan ?? '-' }}</td>
                    @if(auth()->user()->role === 'admin')
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('lokasi-gudang.edit', $lokasi->id) }}"
                                class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal"
                                onclick="confirmDelete(
                                    {{ $lokasi->id }}, 
                                    '{{ $lokasi->nama_lokasi }}',
                                    '{{ route('lokasi-gudang.destroy', $lokasi->id) }}'
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
</div>

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