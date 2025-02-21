<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Heavy Object Group</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons
  <link href="{{  url('')}}/{{  url('')  }}/assets/img/favicon.png" rel="icon">
  <link href="{{  url('')}}/{{  url('')  }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{  url(path: '') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="{{  url(path: '') }}/assets/css/style.css" rel="stylesheet">


</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ url('') }}" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">Heavy Object Group</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your email & password to login</p>
                  </div>

                  @include('_message')

                  <form method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/quill/quill.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{  url('')}}/{{  url('')  }}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{  url('')}}/{{  url('')  }}/assets/js/main.js"></script>

</body>

</html>