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

    <!-- Daftar Supplier Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('daftar-supplier.index') }}">
        <i class="bi bi-database"></i><span>Data Supplier</span>
      </a>
    </li><!-- End Daftar Supplier Nav -->
  </ul>

</aside><!-- End Sidebar -->
