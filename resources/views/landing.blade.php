<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tanza | Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #f8f9fa;
            --panel: #ffffff;
            --card: #ffffff;
            --muted: #6b7280;
            --line: #e5e7eb;
            --accent: #111827;
            --accent-2: #3b82f6;
            --glow: rgba(59, 130, 246, 0.15);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--bg);
            color: var(--accent);
        }

        .nav-glass {
            background: rgba(255, 255, 255, 0.85);
            border-bottom: 1px solid var(--line);
            backdrop-filter: blur(16px);
        }

        .hero-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .hero-photo {
            width: 100%;
            height: 100%;
            min-height: 320px;
            object-fit: cover;
            border-radius: 24px;
            border: 1px solid var(--line);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.45rem 0.75rem;
            border-radius: 999px;
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #2563eb;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .section-grid {
            display: grid;
            gap: 1rem;
        }

        .info-chip {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            border-radius: 999px;
            padding: 0.35rem 0.65rem;
            background: rgba(59, 130, 246, 0.05);
            color: #4b5563;
            font-size: 0.85rem;
        }

        .feature-card,
        .mini-card {
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 22px;
            transition: transform 0.2s cubic-bezier(0.4, 0, 0.2, 1), border-color 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.02);
        }

        .feature-card:hover,
        .mini-card:hover {
            transform: translateY(-6px);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.08);
        }

        .badge-soft {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .btn-cta {
            border-radius: 999px;
            padding: 0.85rem 1.15rem;
            font-weight: 600;
            background: #3b82f6 !important;
            color: #ffffff !important;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3) !important;
        }

        .text-muted-soft {
            color: var(--muted);
        }

        .section-title {
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-size: 0.82rem;
            color: #3b82f6;
            font-weight: 700;
        }

        .text-white {
            color: #111827 !important;
        }
        
        .btn-outline-light {
            border-color: #cbd5e1;
            color: #4b5563;
        }
        
        .btn-outline-light:hover {
            background: #f1f5f9;
            color: #0f172a;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top nav-glass">
        <div class="container py-2">
            <a class="navbar-brand d-flex align-items-center gap-2 text-white fw-bold" href="{{ url('/') }}">
                <span class="d-inline-flex align-items-center justify-content-center rounded-3 bg-light text-dark"
                    style="width:40px; height:40px;">
                    <i class="bi bi-shop"></i>
                </span>
                La Tanza
            </a>
            <div class="ms-auto d-flex flex-wrap gap-2">
                <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">Login</a>
                <a class="btn btn-outline-light btn-sm" href="{{ route('dashboard') }}">Dashboard</a>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <section class="hero-card p-4 p-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="hero-badge mb-3"><i class="bi bi-stars"></i> Sistem POS & Manajemen Toko Modern</span>
                    <h1 class="display-5 fw-bold text-white mb-3">Kelola toko Anda dengan tampilan yang rapi, cepat, dan
                        profesional.</h1>
                    <p class="lead text-muted-soft mb-4">La Tanza membantu tim kasir dan admin mengelola stok,
                        transaksi, pelanggan, karyawan, dan laporan penjualan dari satu dashboard yang jelas dan modern.
                    </p>
                    <div class="d-flex flex-wrap gap-2 mb-4">
                        <span class="info-chip"><i class="bi bi-check2-circle text-info"></i> Dashboard real-time</span>
                        <span class="info-chip"><i class="bi bi-check2-circle text-info"></i> Kelola stok & pelanggan</span>
                        <span class="info-chip"><i class="bi bi-check2-circle text-info"></i> Laporan penjualan</span>
                    </div>
                    <div class="d-flex flex-wrap gap-3">
                        <a class="btn btn-cta"
                            href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right me-2"></i>Login Sekarang</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="mini-card p-3 p-md-4">
                        <img class="hero-photo"
                            src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=900&q=80"
                            alt="Tim toko profesional">
                        <div class="mt-3 d-flex justify-content-between align-items-center">
                            <div>
                                <p class="section-title mb-1">Ringkasan Hari Ini</p>
                                <h4 class="text-white mb-0">Penjualan Toko</h4>
                            </div>
                            <span class="badge badge-soft px-3 py-2">Live</span>
                        </div>
                        <div class="row g-3 mt-1">
                            <div class="col-6">
                                <div class="mini-card p-3">
                                    <small class="text-muted-soft">Total Transaksi</small>
                                    <h3 class="text-white mb-0 mt-1">120</h3>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mini-card p-3">
                                    <small class="text-muted-soft">Pendapatan</small>
                                    <h3 class="text-white mb-0 mt-1">Rp 18Jt</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="fitur" class="mt-5">
            <p class="section-title mb-3">Fitur utama</p>
            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <article class="feature-card p-4 h-100">
                        <i class="bi bi-speedometer2 fs-3 text-primary mb-3"></i>
                        <h5 class="text-white mb-2">Dashboard Ringkas</h5>
                        <p class="text-muted-soft mb-0">Pantau transaksi, keuntungan, dan performa toko dalam satu
                            tampilan yang informatif.</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="feature-card p-4 h-100">
                        <i class="bi bi-calculator fs-3 text-primary mb-3"></i>
                        <h5 class="text-white mb-2">Modul Kasir</h5>
                        <p class="text-muted-soft mb-0">Proses penjualan lebih cepat dengan antarmuka yang sederhana dan
                            fokus pada aktivitas sehari-hari.</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="feature-card p-4 h-100">
                        <i class="bi bi-box-seam fs-3 text-primary mb-3"></i>
                        <h5 class="text-white mb-2">Manajemen Produk</h5>
                        <p class="text-muted-soft mb-0">Atur daftar produk, harga, stok, dan kategori dengan lebih
                            terstruktur.</p>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="feature-card p-4 h-100">
                        <i class="bi bi-receipt fs-3 text-primary mb-3"></i>
                        <h5 class="text-white mb-2">Laporan Transaksi</h5>
                        <p class="text-muted-soft mb-0">Buat laporan penjualan dan detail transaksi untuk mendukung
                            keputusan bisnis Anda.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="mt-5 row g-4">
            <div class="col-lg-8">
                <article class="feature-card p-4 h-100">
                    <p class="section-title mb-2">Kenapa La Tanza?</p>
                    <h3 class="text-white mb-3">Desain modern untuk bisnis retail yang ingin berkembang.</h3>
                    <p class="text-muted-soft mb-0">Website ini dirancang agar mudah digunakan oleh admin maupun kasir.
                        Semua modul utama sudah tersedia dan siap dipakai untuk mendukung operasional toko sehari-hari.
                    </p>
                </article>
            </div>
            <div class="col-lg-4">
                <article class="feature-card p-4 h-100">
                    <p class="section-title mb-2">Mulai sekarang</p>
                    <h5 class="text-white mb-3">Buka panel admin untuk melihat seluruh fitur.</h5>
                    <a class="btn btn-outline-light w-100" href="{{ route('dashboard') }}">Ke Dashboard</a>
                </article>
            </div>
        </section>

        <section class="mt-5 row g-4">
            <div class="col-md-4">
                <article class="feature-card p-4 h-100">
                    <i class="bi bi-graph-up-arrow fs-3 text-primary mb-3"></i>
                    <h5 class="text-white mb-2">Pantau performa toko</h5>
                    <p class="text-muted-soft mb-0">Lihat tren penjualan, keuntungan, dan aktivitas harian dengan
                        tampilan yang mudah dibaca.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="feature-card p-4 h-100">
                    <i class="bi bi-basket2 fs-3 text-primary mb-3"></i>
                    <h5 class="text-white mb-2">Atur inventaris lebih rapi</h5>
                    <p class="text-muted-soft mb-0">Stok, kategori, dan produk bisa dikelola secara sistematis tanpa
                        bingung.</p>
                </article>
            </div>
            <div class="col-md-4">
                <article class="feature-card p-4 h-100">
                    <i class="bi bi-shield-check fs-3 text-primary mb-3"></i>
                    <h5 class="text-white mb-2">Profesional dan aman</h5>
                    <p class="text-muted-soft mb-0">Antarmuka yang bersih, konsisten, dan siap digunakan untuk bisnis
                        retail modern.</p>
                </article>
            </div>
        </section>
    </main>

    <footer class="container py-4 text-muted-soft small">
        © 2026 La Tanza — Sistem toko berbasis Laravel.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
