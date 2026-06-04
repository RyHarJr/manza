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
            <div class="card p-4 h-100 border-0 d-flex flex-row align-items-center gap-4">
                <div class="avatar-circle bg-soft-slate" style="width: 64px; height: 64px;"><i class="bi bi-wallet2 fs-3 text-dark"></i></div>
                <div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing:0.5px;">Total Modal (Valuasi Stok)</h6>
                    <h2 class="mb-0 fw-bold text-dark">Rp {{ number_format($totalModal, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card p-4 h-100 border-0 d-flex flex-row align-items-center gap-4">
                <div class="avatar-circle bg-soft-slate" style="width: 64px; height: 64px;"><i class="bi bi-graph-up-arrow fs-3 text-dark"></i></div>
                <div>
                    <h6 class="text-muted fw-bold mb-1 text-uppercase" style="letter-spacing:0.5px;">Total Keuntungan Penjualan</h6>
                    <h2 class="mb-0 fw-bold text-dark">Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-graph-up-arrow text-slate me-2"></i>Tren Transaksi & Pendapatan</h6>
                </div>
                <div class="card-body">
                    <div id="chartTransaksiBulan" style="height: 350px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card h-100 border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-cart-check-fill text-slate me-2"></i>Produk Paling Laris</h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <ul class="list-group list-group-flush list-group-premium">
                        @forelse($topProduk as $index => $tpr)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle bg-soft-slate">
                                        #{{ $index + 1 }}
                                    </div>
                                    <div class="fw-bold text-dark">{{ $tpr->NamaProduk }}</div>
                                </div>
                                <span class="badge-soft-slate">{{ $tpr->total_terjual }} bg</span>
                            </li>
                        @empty
                            <li class="list-group-item text-center text-muted p-4">Belum ada produk terjual.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-pie-chart-fill text-slate me-2"></i>Status Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div id="chartStatusPembayaran" style="height: 320px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0">
                <div class="card-header bg-white border-0 pt-4 pb-0">
                    <h6 class="mb-0 fw-bold"><i class="bi bi-diagram-3-fill text-slate me-2"></i>Produk per Kategori</h6>
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
                    <h6 class="mb-0 fw-bold"><i class="bi bi-star-fill text-slate me-2"></i>Loyalty Pelanggan</h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <ul class="list-group list-group-flush list-group-premium">
                        @forelse($topPelanggan as $tp)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle bg-soft-slate">
                                        {{ substr($tp->NamaPelanggan, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $tp->NamaPelanggan }}</div>
                                        <small class="text-muted"><i class="bi bi-receipt"></i> {{ $tp->total_trx }} Transaksi</small>
                                    </div>
                                </div>
                                <span class="badge-soft-slate">Rp {{ number_format($tp->total_belanja, 0, ',', '.') }}</span>
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
                    <h6 class="mb-0 fw-bold"><i class="bi bi-person-badge-fill text-slate me-2"></i>Performa Kasir Terbaik</h6>
                </div>
                <div class="card-body px-2 py-0 mt-3">
                    <ul class="list-group list-group-flush list-group-premium">
                        @forelse($topKasir as $tk)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-circle bg-soft-slate">
                                        {{ substr($tk->NamaKaryawan, 0, 1) }}
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $tk->NamaKaryawan }}</div>
                                        <small class="text-muted"><i class="bi bi-bag-check"></i> {{ $tk->total_trx }} Sales ditangani</small>
                                    </div>
                                </div>
                                <span class="badge-soft-slate">Rp {{ number_format($tk->total_jual, 0, ',', '.') }}</span>
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
    <p>RyHar</p>
@endsection

@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
    // Warna tema abu-abu
    const greyPalette = ['#2D2D2D', '#4A4A4A', '#6B6B6B', '#8C8C8C', '#9E9E9E', '#B0B0B0', '#C0C0C0'];

    Highcharts.setOptions({
        chart: { style: { fontFamily: 'inherit' } },
        colors: greyPalette,
        credits: { enabled: false }
    });

    // 1. Transaksi & Revenue per Bulan (Dual Axis)
    Highcharts.chart('chartTransaksiBulan', {
        chart: { type: 'column' },
        title: { text: null },
        xAxis: {
            categories: {!! json_encode(collect($transaksiPerBulan)->pluck('bulan')->toArray()) !!},
            labels: { style: { color: '#666' } }
        },
        yAxis: [{
            title: { text: 'Jumlah Transaksi', style: { color: '#2D2D2D' } },
            labels: { style: { color: '#666' } }
        }, {
            title: { text: 'Revenue (Rp)', style: { color: '#6B6B6B' } },
            labels: { style: { color: '#666' }, formatter: function() { return 'Rp ' + Highcharts.numberFormat(this.value, 0, ',', '.'); } },
            opposite: true
        }],
        tooltip: {
            shared: true,
            useHTML: true,
            headerFormat: '<b>{point.key}</b><br>',
        },
        series: [{
            name: 'Jumlah Transaksi',
            data: {!! json_encode(collect($transaksiPerBulan)->pluck('total')->map(fn($v) => (int)$v)->toArray()) !!},
            color: '#2D2D2D',
            borderRadius: 6
        }, {
            name: 'Revenue',
            type: 'spline',
            yAxis: 1,
            data: {!! json_encode(collect($transaksiPerBulan)->pluck('revenue')->map(fn($v) => (float)$v)->toArray()) !!},
            color: '#9E9E9E',
            lineWidth: 3,
            marker: { radius: 5 },
            tooltip: { pointFormatter: function() { return '<span style="color:' + this.color + '">●</span> Revenue: <b>Rp ' + Highcharts.numberFormat(this.y, 0, ',', '.') + '</b><br>'; } }
        }],
        legend: { align: 'center', verticalAlign: 'bottom' },
        plotOptions: { column: { borderWidth: 0 } }
    });

    // 2. Status Pembayaran (Donut)
    Highcharts.chart('chartStatusPembayaran', {
        chart: { type: 'pie' },
        title: { text: null },
        plotOptions: {
            pie: {
                innerSize: '55%',
                dataLabels: { enabled: true, format: '<b>{point.name}</b>: {point.y}', style: { fontSize: '12px' } },
                borderWidth: 0,
                shadow: false
            }
        },
        series: [{
            name: 'Transaksi',
            data: [
                @foreach($statusPembayaran as $sp)
                {
                    name: '{{ ucfirst($sp->status) }}',
                    y: {{ $sp->total }},
                    color: '{{ $sp->status == "sukses" ? "#0F172A" : ($sp->status == "proses" ? "#64748B" : "#E2E8F0") }}'
                },
                @endforeach
            ]
        }]
    });

    // 3. Produk per Kategori (Pie)
    Highcharts.chart('chartProdukKategori', {
        chart: { type: 'pie' },
        title: { text: null },
        plotOptions: {
            pie: {
                dataLabels: { enabled: true, format: '<b>{point.name}</b>: {point.y}', style: { fontSize: '12px' } },
                borderWidth: 0,
                shadow: false
            }
        },
        series: [{
            name: 'Produk',
            data: [
                @foreach($produkPerKategori as $pk)
                { name: '{{ $pk->kategori }}', y: {{ $pk->total }} },
                @endforeach
            ]
        }]
    });

</script>
@endpush
