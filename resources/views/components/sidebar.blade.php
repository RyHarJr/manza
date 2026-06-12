<aside id="sidebar-wrapper">

    <div class="sidebar-brand">
        <a href="{{ url('/') }}" class="brand-link text-decoration-none w-100">
            <div class="d-flex align-items-center gap-3">
                <div class="brand-logo-icon d-flex align-items-center justify-content-center"
                    style="width: 32px; height: 32px; font-size: 1.4rem; color: #2563eb;">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M464 64H48C21.49 64 0 85.49 0 112v288c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48V112c0-26.51-21.49-48-48-48zM250.77 151l67.5 125h-54.89l-22.13-43.51H173.34l-21.61 43.51H95l69.19-125h86.58zM186.29 203.22L206.57 245h-42.66l22.38-41.78z"></path></svg>
                </div>
                <div>
                    <span class="brand-text">Admin <span style="font-weight: 300;">Manza</span></span>
                </div>
            </div>
        </a>
    </div>

    <nav class="mt-2 py-3">
        <ul class="nav sidebar-menu flex-column w-100">

            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('kasir.index') }}" class="nav-link {{ request()->is('kasir*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-calculator"></i>
                    <span>Kasir</span>
                </a>
            </li>

            <li class="nav-header">Master Data</li>

            <li class="nav-item">
                <a href="{{ route('pemasok.index') }}" class="nav-link {{ request()->is('pemasok*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-truck"></i>
                    <span>Pemasok</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('produk.index') }}" class="nav-link {{ request()->is('produk*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-box-seam"></i>
                    <span>Produk</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('pelanggan.index') }}"
                    class="nav-link {{ request()->is('pelanggan*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-people"></i>
                    <span>Pelanggan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('karyawan.index') }}"
                    class="nav-link {{ request()->is('karyawan*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-person-badge"></i>
                    <span>Karyawan</span>
                </a>
            </li>

            <li class="nav-header">Inventaris</li>

            <li class="nav-item">
                <a href="{{ route('gudang.index') }}" class="nav-link {{ request()->is('gudang*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-house-door"></i>
                    <span>Gudang</span>
                </a>
            </li>

            <li class="nav-header">Transaksi</li>

            <li class="nav-item">
                <a href="{{ route('transaksi.index') }}"
                    class="nav-link {{ request()->is('transaksi*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-receipt"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('detail-transaksi.index') }}"
                    class="nav-link {{ request()->is('detail-transaksi*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-clipboard-data"></i>
                    <span>Detail Transaksi</span>
                </a>
            </li>

            @if (auth()->check() && auth()->user()->role === 'superadmin')
            <li class="nav-header">Superadmin</li>

            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                    class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                    <i class="nav-icon bi bi-shield-lock"></i>
                    <span>Kelola User</span>
                </a>
            </li>
            @endif

        </ul>
    </nav>

    <div class="p-3" style="flex-shrink: 0; border-top: 1px solid rgba(0,0,0,0.06);">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-light text-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2" style="border-radius: 8px; font-weight: 600; border: 1px solid #e5e7eb;">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>

</aside>
