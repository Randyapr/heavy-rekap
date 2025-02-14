<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/3.1.2/css/buttons.bootstrap5.css" rel="stylesheet">
    @stack('styles')

</head>

<body>

    @include('panel.layouts.header')
    @include('panel.layouts.sidebar')
    <main id="main" class="main">
        @yield('content')
        <div>
            <!-- Heavy Cell -->
             
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{  url('')  }}/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.bootstrap5.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.2/js/buttons.colVis.min.js"></script>
    @stack('scripts')
</body>

</html>