<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko La Tanza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    <style>
        :root {
            --lt-dark: #0F172A;          /* Slate 900 */
            --lt-grey: #475569;          /* Slate 600 */
            --lt-grey-mid: #64748B;      /* Slate 500 */
            --lt-grey-light: #94A3B8;    /* Slate 400 */
            --lt-grey-border: #E2E8F0;   /* Slate 200 */
            --lt-bg: #F8F9FA;            /* Soft Gray */
            --lt-white: #FFFFFF;
            --lt-accent: #1E293B;        /* Slate 800 */
            --lt-accent-dark: #0F172A;
            --lt-accent-light: #94A3B8;
            --lt-sidebar: #0F172A;
            --lt-sidebar-dark: #020617;  /* Slate 950 */
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--lt-bg);
            color: var(--lt-grey);
        }

        /* ===== SIDEBAR ===== */
        .app-sidebar {
            background: linear-gradient(180deg, var(--lt-sidebar) 0%, var(--lt-sidebar-dark) 100%) !important;
            border-right: none !important;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
        }

        .sidebar-brand {
            background: rgba(0, 0, 0, 0.2) !important;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
            padding: 1rem !important;
        }

        .sidebar-brand .brand-text {
            font-weight: 700 !important;
            font-size: 1.15rem !important;
            color: var(--lt-white) !important;
            letter-spacing: 0.5px;
        }

        .sidebar-brand .brand-image {
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
        }

        .sidebar-brand .brand-subtitle {
            font-size: 0.65rem;
            color: var(--lt-grey-light);
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        /* Sidebar Menu */
        .sidebar-menu .nav-header {
            color: var(--lt-accent-light) !important;
            font-size: 0.7rem !important;
            font-weight: 600 !important;
            letter-spacing: 1.5px !important;
            text-transform: uppercase !important;
            padding: 1.2rem 1rem 0.5rem !important;
            opacity: 0.9;
        }

        .sidebar-menu .nav-item > .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            margin: 2px 8px !important;
            border-radius: 8px !important;
            padding: 0.6rem 1rem !important;
            font-size: 0.875rem !important;
            font-weight: 400 !important;
            transition: all 0.25s ease !important;
        }

        .sidebar-menu .nav-item > .nav-link:hover {
            background: rgba(255, 255, 255, 0.08) !important;
            color: #fff !important;
            transform: translateX(3px);
        }

        .sidebar-menu .nav-item > .nav-link.active {
            background: rgba(255, 255, 255, 0.15) !important;
            color: #fff !important;
            box-shadow: none !important;
            font-weight: 500 !important;
            border-left: 3px solid #fff !important;
        }

        .sidebar-menu .nav-item > .nav-link .nav-icon {
            font-size: 1.1rem;
            width: 1.6rem;
            margin-right: 0.5rem;
        }

        /* ===== NAVBAR ===== */
        .app-header {
            background: var(--lt-white) !important;
            border-bottom: 1px solid var(--lt-grey-border) !important;
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.04) !important;
        }

        /* ===== CONTENT AREA ===== */
        .app-main {
            background-color: var(--lt-bg);
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            background: var(--lt-white);
        }

        .card-header {
            background: transparent;
            color: var(--lt-dark);
            border-bottom: 1px solid var(--lt-grey-border);
            padding: 1.25rem 1.5rem;
        }

        .card-header h1,
        .card-header h3,
        .card-header h5 {
            color: var(--lt-dark);
            margin: 0;
            font-weight: 700;
            font-size: 1.15rem;
        }

        .card-body {
            padding: 1.5rem;
            background: var(--lt-white);
        }

        .card-footer {
            background: var(--lt-bg);
            border-top: 1px solid var(--lt-grey-border);
            color: var(--lt-grey-light);
            font-size: 0.8rem;
        }

        /* ===== BUTTONS ===== */
        .btn-primary {
            background: var(--lt-accent) !important;
            border-color: var(--lt-accent) !important;
        }

        .btn-primary:hover {
            background: var(--lt-accent-dark) !important;
            border-color: var(--lt-accent-dark) !important;
        }

        /* ===== TABLE ===== */
        .table th {
            background: var(--lt-dark);
            color: var(--lt-white);
            font-weight: 500;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        /* ===== SWEETALERT CUSTOM ===== */
        .swal2-confirm {
            background: var(--lt-accent) !important;
        }

        /* ===== FLASH MESSAGE ===== */
        .alert-success {
            background: #F1F5F9;
            border-color: var(--lt-grey-border);
            color: var(--lt-dark);
        }

        /* ===== SMALL BOX OVERRIDES ===== */
        .small-box {
            border-radius: 16px;
            overflow: hidden;
        }

        /* ===== GLOBAL ORGANIC CLASSES (Moved from Dashboard) ===== */
        .bg-soft-slate { background: #F1F5F9; color: #0F172A; }
        .text-slate { color: #0F172A; }
        
        .avatar-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        
        .badge-soft-slate { 
            background: #F1F5F9; 
            color: #0F172A; 
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        
        .list-group-premium .list-group-item {
            border: none;
            padding: 16px 20px;
            margin-bottom: 8px;
            border-radius: 16px;
            background: transparent;
            transition: background 0.2s;
        }
        .list-group-premium .list-group-item:hover {
            background: #F8F9FA;
        }
    </style>
</head>

<body class="layout-fixed sidebar-expand-lg">
    <div class="app-wrapper">

        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person-circle"></i> Admin
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        @include('components.sidebar')

        <main class="app-main">
            <div class="app-content-header">
                <div class="container-fluid">

                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            @yield('title')
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                        <div class="card-footer">
                            @yield('footer')
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.show_confirm').click(function(event) {
                var form = $(this).closest("form");
                var nama = $(this).data("nama");
                event.preventDefault();
                Swal.fire({
                    title: 'Yakin hapus data?',
                    text: 'Data "' + nama + '" akan dihapus permanen!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });

            // Initialize Select2 Globally
            $('.form-select').select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: 'Pilih opsi...'
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
