<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminJS Manza | Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #f8f9fa;
            color: #1f2937;
            min-height: 100vh;
        }

        .glass {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .small-note {
            color: #6b7280;
            font-size: .95rem;
        }

        .form-control {
            background: #ffffff;
            color: #1f2937;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        .form-control:focus {
            background: #ffffff;
            color: #1f2937;
            box-shadow: 0 0 0 .2rem rgba(59, 130, 246, 0.25);
            border-color: #3b82f6;
        }

        .btn-submit {
            border-radius: 8px;
            padding: .85rem 1rem;
            font-weight: 700;
        }
    </style>
</head>

<body class="d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="glass p-4 p-md-5">
                    <a href="{{ url('/') }}"
                        class="text-decoration-none text-dark d-flex align-items-center gap-2 mb-4">
                        <span
                            class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary text-white"
                            style="width:42px;height:42px;"><i class="bi bi-shop"></i></span>
                        <div>
                            <div class="fw-bold">AdminJS Manza</div>
                            <small class="small-note">Buat akun baru</small>
                        </div>
                    </a>
                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background:rgba(59, 130, 246, 0.1); color:#2563eb; border:1px solid rgba(59, 130, 246, 0.2);">Buat
                        akun baru</span>
                    <h2 class="fw-bold text-dark mb-1">Daftar akun</h2>
                    <p class="small-note mb-4">Isi data berikut untuk mulai menggunakan sistem toko Anda.</p>

                    <form method="POST" action="{{ route('register.post') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger py-2 small mb-3">{{ $errors->first() }}</div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label small-note">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                placeholder="Contoh: Admin Manza" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small-note">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="nama@email.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small-note">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter"
                                required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small-note">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Ulangi password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-submit"
                            style="box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);">Buat
                            Akun</button>
                    </form>

                    <p class="small-note mt-4 mb-0 text-center">Sudah punya akun? <a href="{{ route('login') }}"
                            class="text-primary text-decoration-none fw-semibold">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
