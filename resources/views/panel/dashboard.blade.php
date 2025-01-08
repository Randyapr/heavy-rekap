@extends('panel.layouts.app')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/chart.js" rel="stylesheet">
@endpush

@section('content')
    <div class="pagetitle">
      <h1>Dashboard</h1>
    </div>
    
    <section class="section dashboard">
        <div class="row">
            <!-- Card Total Pemasukan -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pemasukan Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-cart-plus"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalStok) }}</h6>
                                <span class="text-muted small pt-2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Total Pengeluaran -->
            <div class="col-xxl-3 col-md-6">
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

            <!-- Card Stok Tersedia -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Stok Tersedia</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-box"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ number_format($totalStok - $totalPengeluaran) }}</h6>
                                <span class="text-muted small pt-2">Unit</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Total Kategori -->
            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kategori Barang</h5>
                        <div class="d-flex align-items-center">
                            <div class="ps-3">
                                <h6>{{ $totalKategori }}</h6>
                                <small class="text-muted">
                                    Kategori: {{ $kategoris->implode(', ') }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Statistik Barang</h5>
                            <select id="filterRange" class="form-select" style="width: auto;">
                                <option value="year">1 Tahun</option>
                                <option value="half">6 Bulan</option>
                                <option value="quarter">3 Bulan</option>
                                <option value="month">1 Bulan</option>
                                <option value="week">1 Minggu</option>
                                <option value="today">Hari Ini</option>
                            </select>
                        </div>
                        <div style="height: 400px;">
                            <canvas id="barChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    let barChart = null;

    function initChart(data) {
        const ctx = document.getElementById('barChart').getContext('2d');
        
        if (barChart) {
            barChart.destroy();
        }
        
        barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.labels,
                datasets: [{
                    label: 'Pemasukan',
                    data: data.pemasukan,
                    backgroundColor: 'rgba(46, 204, 113, 0.7)',
                    borderColor: 'rgba(46, 204, 113, 1)',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                    barPercentage: 0.7,
                    categoryPercentage: 0.8
                }, {
                    label: 'Pengeluaran',
                    data: data.pengeluaran,
                    backgroundColor: 'rgba(231, 76, 60, 0.7)',
                    borderColor: 'rgba(231, 76, 60, 1)',
                    borderWidth: 2,
                    borderRadius: 5,
                    borderSkipped: false,
                    barPercentage: 0.7,
                    categoryPercentage: 0.8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false,
                            color: 'rgba(0, 0, 0, 0.1)'
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            callback: function(value) {
                                return value.toLocaleString('id-ID');
                            }
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Barang',
                            font: {
                                size: 14,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 12
                            },
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            padding: 20,
                            font: {
                                size: 13
                            },
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    title: {
                        display: true,
                        text: 'Statistik Pemasukan dan Pengeluaran Barang',
                        font: {
                            size: 16,
                            weight: 'bold'
                        },
                        padding: {
                            bottom: 30
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#000',
                        titleFont: {
                            size: 13,
                            weight: 'bold'
                        },
                        bodyColor: '#000',
                        bodyFont: {
                            size: 12
                        },
                        borderColor: '#ddd',
                        borderWidth: 1,
                        padding: 12,
                        displayColors: true,
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.parsed.y.toLocaleString('id-ID') + ' unit';
                                return label;
                            }
                        }
                    }
                }
            }
        });
    }

    function updateChart(range = 'year') {
        fetch(`/dashboard/chart-data?range=${range}`)
            .then(response => response.json())
            .then(data => {
                initChart(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateChart();
        
        document.getElementById('filterRange').addEventListener('change', function() {
            updateChart(this.value);
        });
    });
    </script>
    @endpush
@endsection