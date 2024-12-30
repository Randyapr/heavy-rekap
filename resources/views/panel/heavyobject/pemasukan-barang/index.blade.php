<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Heavy Object Group</title>
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
    <main id="main" class="main">
        @yield('content')
        <div>
            <h1>Pemasukan Barang</h1>
            <div class="container mt-5">
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

                <!-- tambah batang -->
                <a href="{{ route('pemasukan-barang.create') }}" class="btn btn-primary">Tambah Pemasukan Barang</a>
                <table class="table table-bordered mt-1">
                    <thead>
                        <tr>
                            <th>Tanggal Penerimaan</th>
                            <th>Nama Supplier</th>
                            <th>Nama Barang</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Diterima</th>
                            <th>Satuan</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            @if(auth()->user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan_barang as $item)
                        <tr>
                            <td>{{ $item->tanggal_penerimaan_formatted }}</td>
                            <td>{{ $item->nama_supplier }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->kode_barang }}</td>
                            <td>{{ $item->jumlah_diterima }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->kondisi_barang }}</td>
                            <td>{{ $item->lokasi_penyimpanan }}</td>
                            @if(auth()->user()->role === 'admin')
                            <td>
                                <a href="{{ route('pemasukan-barang.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pemasukan-barang.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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