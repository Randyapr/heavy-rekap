@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Data Kategori Barang</h1>
    
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
                    <th>Nama Kategori</th>
                    <th>Jumlah Barang</th>
                    <th>Daftar Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategoriBarangs as $key => $kategori)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $kategori['nama_kategori'] }}</td>
                    <td>{{ $kategori['jumlah_barang'] }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#daftarBarangModal{{ $key }}">
                            Lihat Barang
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="daftarBarangModal{{ $key }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daftar Barang di Kategori {{ $kategori['nama_kategori'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            @foreach(App\Models\DaftarBarang::where('kategori_barang', $kategori['nama_kategori'])->get() as $barang)
                                                <li>{{ $barang->nama_barang }} ({{ $barang->kode_barang }})</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 