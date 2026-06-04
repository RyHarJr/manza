
<aside class="app-sidebar shadow" data-bs-theme="dark">

    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link text-decoration-none">
            <div class="d-flex align-items-center gap-2">
                <div class="brand-logo-icon d-flex align-items-center justify-content-center"
                    style="width:40px; height:40px; background: #6B6B6B;
                           border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
                    <i class="bi bi-shop" style="font-size:1.3rem; color:#fff;"></i>
                </div>
                <div>
                    <span class="brand-text fw-bold" style="color:#FFFFFF; font-size:1.1rem;">La Tanza</span>
                    <br>
                    <span class="brand-subtitle"
                        style="font-size:0.65rem; color:#9E9E9E; letter-spacing:1.5px;">TOKO &
                        DISTRIBUSI</span>
                </div>
            </div>
        </a>
    </div>

    <nav class="mt-2">
        <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{ url('/dashboard') }}"
                    class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kasir.index') }}"
                    class="nav-link {{ request()->is('kasir*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-calculator"></i>
                    <p>Kasir</p>
                </a>
            </li>

            <li class="nav-header">Master Data</li>

            <li class="nav-item">
                <a href="{{ route('pemasok.index') }}"
                    class="nav-link {{ request()->is('pemasok*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-truck"></i>
                    <p>Pemasok</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('produk.index') }}"
                    class="nav-link {{ request()->is('produk*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <p>Produk</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pelanggan.index') }}"
                    class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-people"></i>
                    <p>Pelanggan</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('karyawan.index') }}"
                    class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <p>Karyawan</p>
                </a>
            </li>

            <li class="nav-header">Inventaris</li>

            <li class="nav-item">
                <a href="{{ route('gudang.index') }}"
                    class="nav-link {{ request()->is('gudang*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-house-door"></i>
                    <p>Gudang</p>
                </a>
            </li>

            <li class="nav-header">Transaksi</li>

            <li class="nav-item">
                <a href="{{ route('transaksi.index') }}"
                    class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-receipt"></i>
                    <p>Transaksi</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('detail-transaksi.index') }}"
                    class="nav-link {{ request()->is('detail-transaksi*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-clipboard-data"></i>
                    <p>Detail Transaksi</p>
                </a>
            </li>

        </ul>
    </nav>

</aside>
