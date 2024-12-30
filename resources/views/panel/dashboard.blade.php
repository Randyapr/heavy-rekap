@extends('panel.layouts.app')

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    
    <section class="section dashboard">
        <div class="row">
            <!-- Kartu Total Pemasukan -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pemasukan Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-plus"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalPemasukan) }}</h6>
                                <span class="text-muted small pt-2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Pengeluaran -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengeluaran Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-dash"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalPengeluaran) }}</h6>
                                <span class="text-muted small pt-2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Stok -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Stok Saat Ini</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalStok) }}</h6>
                                <span class="text-muted small pt-2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kartu Total Kategoriee -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-tags"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalKategori) }}</h6>
                                <span class="text-muted small pt-2">Kategori</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi User -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Selamat Datang, {{ auth()->user()->name }}</h5>
                        <p>Anda login sebagai {{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection