@extends('main')

@section('title')
@endsection

@section('content')
    <div class="greeting-header mt-2 mb-4">
        <h2>Halo, Administrator! 👋</h2>
        <p>Berikut adalah pantauan ringkas performa bisnismu hari ini.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card p-4 h-100 border-0 d-flex flex-row align-items-center gap-4 text-white"
                style="background: linear-gradient(135deg, #3b82f6, #1d4ed8); box-shadow: 0 10px 25px rgba(37, 99, 235, 0.25) !important;">
                <div class="avatar-circle" style="background: rgba(255,255,255,0.15); width: 64px; height: 64px;"><i
                        class="bi bi-wallet2 fs-3 text-white"></i></div>
                <div>
                    <h6 class="fw-semibold mb-1"
                        style="color: rgba(255,255,255,0.8); letter-spacing:0.5px; font-size: 0.85rem">TOTAL MODAL (VALUASI
                        STOK)</h6>
                    <h2 class="mb-0 fw-bold">Rp {{ number_format($totalModal, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-4 h-100 border-0 d-flex flex-row align-items-center gap-4">
                <div class="avatar-circle bg-soft-primary" style="width: 64px; height: 64px;"><i
                        class="bi bi-graph-up-arrow fs-3 text-primary"></i></div>
                <div>
                    <h6 class="text-muted fw-semibold mb-1" style="letter-spacing:0.5px; font-size: 0.85rem">TOTAL
                        KEUNTUNGAN PENJUALAN</h6>
                    <h2 class="mb-0 fw-bold text-dark">Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-graph-up-arrow text-primary me-2"></i>Tren Transaksi &
                        Pendapatan</h6>
                </div>
                <div class="card-body">
                    <div id="chartTransaksiBulan" style="height: 350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-cart-check-fill text-primary me-2"></i>Produk Paling Laris</h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <div id="chartTopProduk" style="height: 350px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-credit-card-fill text-primary me-2"></i>Metode Pembayaran
                        Terbanyak</h6>
                </div>
                <div class="card-body">
                    <div id="chartStatusPembayaran" style="height: 320px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-diagram-3-fill text-primary me-2"></i>Produk per Kategori</h6>
                </div>
                <div class="card-body">
                    <div id="chartProdukKategori" style="height: 320px;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-lg-6">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-star-fill text-primary me-2"></i>Loyalty Pelanggan</h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <ul class="list-group list-group-flush list-group-premium">
                        @forelse($topPelanggan as $tp)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle bg-soft-primary">
                                        {{ substr($tp->NamaPelanggan, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $tp->NamaPelanggan }}</div>
                                        <small class="text-muted"><i class="bi bi-receipt"></i> {{ $tp->total_trx }}
                                            Transaksi</small>
                                    </div>
                                </div>
                                <span class="badge-soft-primary">Rp
                                    {{ number_format($tp->total_belanja, 0, ',', '.') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted p-4">Belum ada pelanggan.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-person-badge-fill text-primary me-2"></i>Performa Kasir Terbaik
                    </h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <ul class="list-group list-group-flush list-group-premium">
                        @forelse($topKasir as $tk)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle bg-soft-primary">
                                        {{ substr($tk->NamaKaryawan, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $tk->NamaKaryawan }}</div>
                                        <small class="text-muted"><i class="bi bi-bag-check"></i> {{ $tk->total_trx }} Sales
                                            ditangani</small>
                                    </div>
                                </div>
                                <span class="badge-soft-primary">Rp {{ number_format($tk->total_jual, 0, ',', '.') }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted p-4">Belum ada transaksi kasir.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <p>Latanza</p>
@endsection

@push('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script>
        // Warna tema premium cerah
        const vibrantPalette = ['#6366f1', '#ec4899', '#14b8a6', '#f59e0b', '#8b5cf6', '#3b82f6', '#ef4444'];

        Highcharts.setOptions({
            chart: {
                style: {
                    fontFamily: 'inherit'
                },
                backgroundColor: '#ffffff'
            },
            colors: vibrantPalette,
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            }
        });

        // 1. Transaksi & Revenue (Harian)
        Highcharts.chart('chartTransaksiBulan', {
            chart: {
                type: 'areaspline',
                backgroundColor: '#ffffff'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    @foreach ($transaksiHarian as $trx)
                        "{{ $trx->tanggal }}",
                    @endforeach
                ],
                gridLineWidth: 1,
                gridLineColor: '#f3f4f6',
                lineColor: '#e5e7eb',
                labels: {
                    style: {
                        color: '#9ca3af'
                    }
                }
            },
            yAxis: [{
                title: {
                    text: null
                },
                gridLineColor: '#f3f4f6',
                labels: {
                    style: {
                        color: '#9ca3af'
                    }
                }
            }, {
                title: {
                    text: null
                },
                gridLineWidth: 0,
                labels: {
                    style: {
                        color: '#9ca3af'
                    },
                    formatter: function() {
                        return 'Rp ' + Highcharts.numberFormat(this.value, 0, ',', '.');
                    }
                },
                opposite: true
            }],
            tooltip: {
                shared: true,
                useHTML: true,
                backgroundColor: 'rgba(255,255,255,0.95)',
                borderColor: '#e5e7eb',
                shadow: true,
                borderRadius: 8
            },
            series: [{
                name: 'Jumlah Transaksi',
                data: [
                    @foreach ($transaksiHarian as $trx)
                        {{ $trx->total }},
                    @endforeach
                ],
                color: '#ec4899',
                lineWidth: 2,
                type: 'spline',
                marker: {
                    enabled: false,
                    symbol: 'circle'
                }
            }, {
                name: 'Revenue',
                yAxis: 1,
                data: [
                    @foreach ($transaksiHarian as $trx)
                        {{ $trx->revenue }},
                    @endforeach
                ],
                color: '#3b82f6',
                lineWidth: 3,
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, 'rgba(59, 130, 246, 0.3)'],
                        [1, 'rgba(59, 130, 246, 0.0)']
                    ]
                },
                marker: {
                    radius: 4,
                    symbol: 'circle',
                    fillColor: '#ffffff',
                    lineWidth: 2,
                    lineColor: '#3b82f6'
                }
            }],
            legend: {
                align: 'right',
                verticalAlign: 'top',
                itemStyle: {
                    color: '#6b7280',
                    fontWeight: '500'
                }
            },
            plotOptions: {
                series: {
                    fillOpacity: 0.5
                }
            }
        });

        // 2. Metode Pembayaran Terbanyak (Donut)
        Highcharts.chart('chartStatusPembayaran', {
            chart: {
                type: 'pie',
                backgroundColor: '#ffffff'
            },
            title: {
                text: null
            },
            plotOptions: {
                pie: {
                    innerSize: '55%',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: {
                            fontSize: '12px',
                            fontWeight: '500',
                            color: '#4b5563'
                        }
                    },
                    borderWidth: 0,
                    shadow: false
                }
            },
            tooltip: {
                pointFormat: '<b>{point.y}</b> transaksi ({point.percentage:.1f}%)',
                backgroundColor: 'rgba(255,255,255,0.95)',
                borderColor: '#e5e7eb',
                shadow: true,
                borderRadius: 8
            },
            series: [{
                name: 'Metode',
                data: [
                    @foreach ($metodePembayaran as $mp)
                        {
                            name: '{{ $mp->metode }}',
                            y: {{ $mp->total }}
                        },
                    @endforeach
                ]
            }]
        });

        // 3. Produk per Kategori (Pie)
        Highcharts.chart('chartProdukKategori', {
            chart: {
                type: 'pie'
            },
            title: {
                text: null
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.y}',
                        style: {
                            fontSize: '12px'
                        }
                    },
                    borderWidth: 0,
                    shadow: false
                }
            },
            series: [{
                name: 'Produk',
                data: [
                    @foreach ($produkPerKategori as $pk)
                        {
                            name: '{{ $pk->kategori }}',
                            y: {{ $pk->total }}
                        },
                    @endforeach
                ]
            }]
        });

        // 4. Produk Paling Laris (Bar Chart)
        Highcharts.chart('chartTopProduk', {
            chart: {
                type: 'bar',
                backgroundColor: '#ffffff'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: [
                    @foreach ($topProduk as $tp)
                        "{{ $tp->NamaProduk }}",
                    @endforeach
                ],
                gridLineWidth: 0,
                lineWidth: 0,
                labels: {
                    style: {
                        color: '#4b5563',
                        fontSize: '11px',
                        fontWeight: '500'
                    }
                }
            },
            yAxis: {
                title: {
                    text: null
                },
                gridLineWidth: 0,
                labels: {
                    enabled: false
                }
            },
            tooltip: {
                useHTML: true,
                headerFormat: '<b>{point.key}</b><br>',
                pointFormat: 'Terjual: <b>{point.y}</b> items',
                backgroundColor: 'rgba(255,255,255,0.95)',
                borderColor: '#e5e7eb',
                shadow: true,
                borderRadius: 8
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    dataLabels: {
                        enabled: true,
                        style: {
                            fontWeight: 'bold'
                        }
                    }
                }
            },
            series: [{
                name: 'Terjual',
                colorByPoint: true,
                data: [
                    @foreach ($topProduk as $tp)
                        {{ $tp->total_terjual }},
                    @endforeach
                ]
            }],
            legend: {
                enabled: false
            }
        });
    </script>
@endpush
