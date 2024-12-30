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
    <main id="main" class="main">
        @yield('content')
        <div>
            <!-- Heavy Cell -->
            <div class="container">
                <h1>Tambah Supplier</h1>
                <form action="{{ route('daftar_suppliers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_supplier" class="form-label">Nama Supplier</label>
                        <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp" class="form-label">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="barang_yang_dikirim" class="form-label">Barang Yang Dikirim</label>
                        <input type="text" class="form-control" id="barang_yang_dikirim" name="barang_yang_dikirim" required>
                    </div>
                    <div class="form-group">
                        <label for="catatan" class="form-label">Catatan (opsional)</label>
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        <a href="{{ route('daftar_suppliers.index') }}" class="btn btn-secondary mt-4">Batal</a>
                    </div>
                </form>
            </div>

            <!-- HC End -->
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