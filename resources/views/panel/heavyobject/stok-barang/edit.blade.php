<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Stok Barang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">
    @yield('style')
</head>

<body>
    @include('panel.layouts.header')
    @include('panel.layouts.sidebar')

    <main id="main" class="main">
        <div class="container mt-4">
            <h4>Edit Stok Barang</h4>
            <form action="{{ route('stok-barang.update', $stokBarang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" value="{{ $stokBarang->nama_barang }}" required>
                </div>

                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control" value="{{ $stokBarang->kode_barang }}" required>
                </div>

                <div class="form-group">
                    <label>Stok Awal</label>
                    <input type="number" name="stok_awal" class="form-control" value="{{ $stokBarang->stok_awal }}" required>
                </div>

                <div class="form-group">
                    <label>Penerimaan</label>
                    <input type="number" name="penerimaan" class="form-control" value="{{ $stokBarang->penerimaan }}" required>
                </div>

                <div class="form-group">
                    <label>Pengeluaran</label>
                    <input type="number" name="pengeluaran" class="form-control" value="{{ $stokBarang->pengeluaran }}" required>
                </div>

                <div class="form-group">
                    <label>Stok Akhir</label>
                    <input type="number" name="stok_akhir" class="form-control" value="{{ $stokBarang->stok_akhir }}" required>
                </div>

                <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" class="form-control" value="{{ $stokBarang->satuan }}">
                </div>

                <div class="form-group">
                    <label>Lokasi Penyimpanan</label>
                    <input type="text" name="lokasi_penyimpanan" class="form-control" value="{{ $stokBarang->lokasi_penyimpanan }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
                <a href="{{ route('stok-barang.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </form>
        </div>
    </main>

    @include('panel.layouts.footer')

    <!-- Vendor JS Files -->
    <script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
    @yield('script')
</body>

</html>
