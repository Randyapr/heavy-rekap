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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                <h2>Pemasukan Barang</h2>
                <form action="{{ route('pemasukan-barang.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Tanggal Penerimaan</label>
                        <input type="datetime-local" name="tanggal_penerimaan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Supplier</label>
                        <input type="text" name="nama_supplier" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor PO</label>
                        <input type="text" name="nomor_po" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Diterima</label>
                        <input type="number" name="jumlah_diterima" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Kondisi Barang</label>
                        <select name="kondisi_barang" class="form-control">
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                            <option value="cacat">Cacat</option>
                            <option value="segel">Segel</option>
                            <option value="fresh">Fresh</option>
                            <option value="ex tele">Ex Tele</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Penyimpanan</label>
                        <input type="text" name="lokasi_penyimpanan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                        <a href="{{ route('pemasukan-barang.index') }}" class="btn btn-secondary mt-4">Batal</a>
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