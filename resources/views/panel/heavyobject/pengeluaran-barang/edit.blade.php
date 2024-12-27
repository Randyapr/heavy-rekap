<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Edit Pengeluaran Bahan</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('') }}/assets/img/favicon.png" rel="icon">
    <link href="{{ url('') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="{{ url('') }}/assets/css/style.css" rel="stylesheet">
    @yield('style')

</head>

<body>

    @include('panel.layouts.header')
    @include('panel.layouts.sidebar')

    <main id="main" class="main d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-6">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Form Edit Pengeluaran Bahan</h5>

                    <!-- Form Edit -->
                    <form action="{{ route('pengeluaran-barang.update', $bahan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="tanggal_pengeluaran" class="form-label">Tanggal Pengeluaran</label>
                            <input type="datetime-local" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" value="{{ $bahan->tanggal_pengeluaran }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $bahan->nama_barang }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="kode_barang" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $bahan->kode_barang }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_dikeluarkan" class="form-label">Jumlah Dikeluarkan</label>
                            <input type="number" class="form-control" id="jumlah_dikeluarkan" name="jumlah_dikeluarkan" value="{{ $bahan->jumlah_dikeluarkan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="satuan" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ $bahan->satuan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi_tujuan" class="form-label">Lokasi Tujuan</label>
                            <input type="text" class="form-control" id="lokasi_tujuan" name="lokasi_tujuan" value="{{ $bahan->lokasi_tujuan }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_penerima" class="form-label">Nama Penerima</label>
                            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" value="{{ $bahan->nama_penerima }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="nama_petugas" class="form-label">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="{{ $bahan->nama_petugas }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note</label>
                            <textarea class="form-control" id="note" name="note">{{ $bahan->note }}</textarea>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('pengeluaran-bahan.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                        </form>
                        <!-- End Form Edit -->

                </div>
            </div>

        </div>
    </main>

    @include('panel.layouts.footer')

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ url('') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ url('') }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/quill/quill.js"></script>
    <script src="{{ url('') }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ url('') }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ url('') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('') }}/assets/js/main.js"></script>
    @yield('script')

</body>

</html>