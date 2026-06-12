<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toko La Tanza</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css"
        rel="stylesheet" />

    <style>
        /* ===== CSS VARIABLES (Admin Light Mode) ===== */
        :root {
            /* Colors */
            --lt-primary: #3b82f6; /* crisp blue */
            --lt-primary-dark: #2563eb;
            --lt-accent: #3b82f6;
            --lt-accent-dark: #111827;
            --lt-accent-light: rgba(59, 130, 246, 0.12);
            
            /* Structural Colors */
            --lt-dark: #1f2937;
            --lt-sidebar: #ffffff;
            --lt-white: #ffffff;
            
            /* Soft Tints */
            --lt-grey-bg: #f8f9fa; /* body background */
            --lt-grey: #6b7280; /* secondary text */
            --lt-grey-border: #e5e7eb;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--lt-grey-bg);
            color: var(--lt-accent-dark);
        }

        /* ===== SIDEBAR & WRAPPER ===== */
        #wrapper {
            display: flex;
            width: 100%;
        }

        #sidebar-wrapper {
            width: 260px;
            background: var(--lt-sidebar);
            border-right: 1px solid var(--lt-grey-border);
            flex-shrink: 0;
            position: sticky;
            top: 0;
            align-self: flex-start;
            height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1040;
            overflow: hidden;
        }

        #page-content-wrapper {
            flex-grow: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: var(--lt-grey-bg);
        }

        @media (max-width: 991.98px) {
            #sidebar-wrapper {
                margin-left: -260px;
                position: fixed;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
            /* Optional overlay for mobile */
            #wrapper.toggled::before {
                content: '';
                position: fixed;
                top: 0; left: 0; right: 0; bottom: 0;
                background: rgba(0,0,0,0.4);
                z-index: 1030;
                backdrop-filter: blur(2px);
            }
        }

        #sidebar-wrapper nav {
            flex: 1 1 auto;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 transparent;
        }

        #sidebar-wrapper nav::-webkit-scrollbar {
            width: 4px;
        }
        #sidebar-wrapper nav::-webkit-scrollbar-track {
            background: transparent;
        }
        #sidebar-wrapper nav::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        .sidebar-brand {
            background: var(--lt-white) !important;
            border-bottom: 1px solid var(--lt-grey-border) !important;
            padding: 1.25rem 1rem !important;
            flex-shrink: 0;
            display: flex;
            align-items: center;
        }

        .sidebar-brand .brand-text {
            font-weight: 800 !important;
            font-size: 1.25rem !important;
            color: #111827 !important;
            letter-spacing: -0.5px;
        }

        .sidebar-brand .brand-subtitle {
            font-size: 0.65rem;
            color: var(--lt-grey);
            font-weight: 600;
        }

        /* Sidebar Menu */
        .sidebar-menu .nav-header {
            color: #9ca3af !important;
            font-size: 0.75rem !important;
            font-weight: 600 !important;
            padding: 1.5rem 1.5rem 0.5rem !important;
            text-transform: capitalize !important;
            letter-spacing: normal !important;
        }

        .sidebar-menu .nav-item>.nav-link {
            color: #4b5563 !important;
            margin: 4px 1rem !important;
            border-radius: 8px !important;
            padding: 0.6rem 0.8rem !important;
            font-size: 0.9rem !important;
            font-weight: 500 !important;
            transition: all 0.2s ease !important;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .sidebar-menu .nav-item>.nav-link:hover {
            color: var(--lt-primary) !important;
            background: rgba(59, 130, 246, 0.04) !important;
        }

        .sidebar-menu .nav-item>.nav-link.active {
            background: rgba(59, 130, 246, 0.1) !important;
            color: var(--lt-primary) !important;
            font-weight: 600 !important;
            border-left: none !important;
        }

        .sidebar-menu .nav-item>.nav-link .nav-icon {
            font-size: 1.15rem;
            width: 1.8rem;
            margin-right: 0.4rem;
            color: #9ca3af;
            transition: color 0.2s ease;
        }

        .sidebar-menu .nav-item>.nav-link:hover .nav-icon,
        .sidebar-menu .nav-item>.nav-link.active .nav-icon {
            color: var(--lt-primary);
            opacity: 1;
        }

        /* ===== NAVBAR ===== */
        .app-header {
            background: #ffffff !important;
            border-bottom: 1px solid var(--lt-grey-border) !important;
            z-index: 1020;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03) !important;
            border: 1px solid rgba(0,0,0,0.02) !important;
            background: #ffffff;
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
            background: #3b82f6 !important;
            border-color: #3b82f6 !important;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.25);
            color: #fff !important;
        }

        .btn-primary:hover {
            background: #2563eb !important;
            border-color: #2563eb !important;
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.35);
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981, #059669) !important;
            border-color: #10b981 !important;
        }

        .btn-warning {
            background: linear-gradient(135deg, #fbbf24, #f59e0b) !important;
            border-color: #f59e0b !important;
            color: #111827 !important;
        }

        /* ===== PREMIUM TABLE DESIGN ===== */
        .table-responsive {
            background: #ffffff;
            border-radius: 12px;
            border: none;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin-bottom: 0;
        }

        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
            white-space: nowrap;
        }

        .table thead th {
            background: #f9fafb !important;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            border-top: none;
        }

        .table tbody td {
            padding: 1rem 1.5rem;
            vertical-align: middle;
            color: #4b5563;
            font-weight: 500;
            border-bottom: 1px solid #f3f4f6;
            transition: background 0.2s;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .table-hover tbody tr:hover td {
            background-color: rgba(59, 130, 246, 0.04) !important;
            color: var(--lt-accent-dark);
        }
        
        .table-light {
            --bs-table-bg: transparent;
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
        .bg-soft-primary {
            background: var(--lt-accent-light);
            color: var(--lt-accent-dark);
            background-color: rgba(59, 130, 246, 0.12);
        }

        .text-primary {
            color: var(--lt-accent);
        }

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
            box-shadow: inset 0 2px 4px rgba(255, 255, 255, 0.3);
        }

        .badge-soft-primary {
            background: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
            letter-spacing: 0.3px;
            border: 1px solid rgba(59, 130, 246, 0.2);
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

        /* ===== FORM CONTROLS ===== */
        .form-control, .form-select {
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #1f2937;
            background: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 0.2rem rgba(59, 130, 246, 0.15);
        }

        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #4b5563;
        }
    </style>
</head>

<body class="layout-custom">
    <div id="wrapper">

        @include('components.sidebar')

        <main id="page-content-wrapper">
            <nav class="app-header navbar navbar-expand-lg border-bottom px-4 py-3 sticky-top">
                <div class="container-fluid">
                    <button class="btn btn-light d-lg-none border text-primary" id="sidebarToggle">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold text-dark" href="#">
                                <i class="bi bi-person-circle text-primary fs-5 align-middle me-1"></i> Admin
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-3 px-lg-5 py-4 py-lg-5">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2 text-success fs-5 align-middle"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header border-0 pt-4 pb-0 px-4">
                        @yield('title')
                    </div>
                    <div class="card-body px-4 py-4">
                        @yield('content')
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 px-4 text-muted small">
                        @yield('footer')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Setup Sidebar Toggle
            $("#sidebarToggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });

            // Handle Overlay Click
            $(document).on('click', function(e) {
                if ($(window).width() < 992) {
                    if (!$(e.target).closest('#sidebar-wrapper').length && !$(e.target).closest('#sidebarToggle').length && $('#wrapper').hasClass('toggled')) {
                        $('#wrapper').removeClass('toggled');
                    }
                }
            });

            // SweetAlert Confirm
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
