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

                    <!-- Heavy Cell -->
                    @section('content')
                    <div class="container">
                        <!-- Heavy Cell -->
                        <form action="{{ route('pemasukan-barang.update', $pemasukan_barang->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
                                <input type="datetime-local" name="tanggal_penerimaan" class="form-control" value="{{ old('tanggal_penerimaan', $pemasukan_barang->tanggal_penerimaan) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nama_supplier">Nama Supplier</label>
                                <input type="text" name="nama_supplier" class="form-control" value="{{ old('nama_supplier', $pemasukan_barang->nama_supplier) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang', $pemasukan_barang->nama_barang) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang', $pemasukan_barang->kode_barang) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="jumlah_diterima">Jumlah Diterima</label>
                                <input type="number" name="jumlah_diterima" class="form-control" value="{{ old('jumlah_diterima', $pemasukan_barang->jumlah_diterima) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <input type="text" name="satuan" class="form-control" value="{{ old('satuan', $pemasukan_barang->satuan) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="kondisi_barang">Kondisi Barang</label>
                                <select name="kondisi_barang" class="form-control" required>
                                    <option value="Baik" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="Rusak" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="Cacat" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Cacat' ? 'selected' : '' }}>Cacat</option>
                                    <option value="Segel" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Segel' ? 'selected' : '' }}>Segel</option>
                                    <option value="Fresh" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Fresh' ? 'selected' : '' }}>Fresh</option>
                                    <option value="Ex Tele" {{ old('kondisi_barang', $pemasukan_barang->kondisi_barang) == 'Ex Tele' ? 'selected' : '' }}>Ex Tele</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lokasi_penyimpanan">Lokasi Penyimpanan</label>
                                <input type="text" name="lokasi_penyimpanan" class="form-control" value="{{ old('lokasi_penyimpanan', $pemasukan_barang->lokasi_penyimpanan) }}" required>

                            </div>

                            <div class="form-group">
                                <label for="nama_petugas">Nama Petugas</label>
                                <input type="text" name="nama_petugas" class="form-control" value="{{ old('nama_petugas', $pemasukan_barang->nama_petugas) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="note">Catatan</label>
                                <textarea name="note" class="form-control">{{ old('note', $pemasukan_barang->note) }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
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