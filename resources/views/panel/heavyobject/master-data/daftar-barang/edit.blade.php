<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Heavy Object Group</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{  url('')  }}/assets/img/favicon.png" rel="icon">
    <link href="{{  url('')  }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{  url('')  }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="{{  url('')  }}/assets/css/style.css" rel="stylesheet">
    @yield('style')

</head>

<body>

    @include('panel.layouts.header')
    @include('panel.layouts.sidebar')
    <main id="main" class="main d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Edit Barang</h5>

                    @section('content')
                    <div class="container">
                        <form action="{{ route('daftar_barang.update', $daftarBarang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label>Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" value="{{ $daftarBarang->nama_barang }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" value="{{ $daftarBarang->kode_barang }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Kategori Barang</label>
                                <input type="text" name="kategori_barang" class="form-control" value="{{ $daftarBarang->kategori_barang }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Satuan</label>
                                <input type="text" name="satuan" class="form-control" value="{{ $daftarBarang->satuan }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Lokasi Penyimpanan</label>
                                <input type="text" name="lokasi_penyimpanan" class="form-control" value="{{ $daftarBarang->lokasi_penyimpanan }}" required>
                            </div>
                            <div class="mb-3">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control">{{ $daftarBarang->keterangan }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('daftar_barang.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>

                        </form>
                    </div>

                    <!-- HC End -->
                </div>
            </div>
            
        </div>
    </main>

    @include('panel.layouts.footer')
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{  url('')  }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{  url('')  }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{  url('')  }}/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="{{  url('')  }}/assets/vendor/echarts/echarts.min.js"></script>
    <script src="{{  url('')  }}/assets/vendor/quill/quill.js"></script>
    <script src="{{  url('')  }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{  url('')  }}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{  url('')  }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{  url('')  }}/assets/js/main.js"></script>
    @yield('script')
</body>

</html>