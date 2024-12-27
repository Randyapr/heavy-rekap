<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <!-- Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- Stok Barang Nav -->
    <!-- End Stok Barang Nav -->

    <!-- Pemasukan Barang Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('pemasukan-barang.index') }}">
        <i class="bi bi-journal-text"></i><span>Pemasukan Barang</span>
      </a>
    </li><!-- End Pemasukan Barang Nav -->

    <!-- Pengeluaran Barang Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('pengeluaran-barang.index') }}">
        <i class="bi bi-layout-text-window-reverse"></i><span>Pengeluaran Barang</span>
      </a>
    </li><!-- End Pengeluaran Barang Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#master-data" data-bs-toggle="collapse" href="#">
        <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="master-data" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="{{ route('daftar-barang.index') }}">
            <i class="bi bi-circle"></i><span>Daftar Barang</span>
          </a>
        </li>
        <li>
          <a href="{{ url('panel/heavyobject/master-data/daftar-supplier') }}">
            <i class="bi bi-people"></i><span>Daftar Supplier</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Rekap Total Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('stok-barang.index') }}">
        <i class="bi bi-bar-chart"></i><span>Stok Barang</span>
      </a>
    </li><!-- End Rekap Total Nav -->

  </ul>

</aside><!-- End Sidebar -->