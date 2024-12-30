@extends('panel.layouts.app')

@section('content')
<div class="container">
    <h1>Data Lokasi Gudang</h1>
    
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
                    <th>Jumlah Barang</th>
                    <th>Daftar Barang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lokasiGudangs as $key => $lokasi)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $lokasi['nama_lokasi'] }}</td>
                    <td>{{ $lokasi['jumlah_barang'] }}</td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#daftarBarangModal{{ $key }}">
                            Lihat Barang
                        </button>

                        <!-- Modalnyooo -->
                        <div class="modal fade" id="daftarBarangModal{{ $key }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Daftar Barang di {{ $lokasi['nama_lokasi'] }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            @foreach(App\Models\DaftarBarang::where('lokasi_penyimpanan', $lokasi['nama_lokasi'])->get() as $barang)
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