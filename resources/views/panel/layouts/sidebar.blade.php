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

    <!-- Master Data Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#master-data-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-database"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="master-data-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('daftar-barang.index') }}">
                    <i class="bi bi-circle"></i><span>Data Barang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('daftar-supplier.index') }}">
                    <i class="bi bi-circle"></i><span>Data Supplier</span>
                </a>
            </li>
            <li>
                <a href="{{ route('lokasi-gudang.index') }}">
                    <i class="bi bi-circle"></i><span>Data Lokasi Gudang</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kategori-barang.index') }}">
                    <i class="bi bi-circle"></i><span>Data Kategori</span>
                </a>
            </li>
        </ul>
    </li>
  </ul>

</aside><!-- End Sidebar -->
