<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Tanza | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #07111f;
            --panel: #111827;
            --line: rgba(148, 163, 184, .18);
            --muted: #dbe5f0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background:
                radial-gradient(circle at top, rgba(56, 189, 248, 0.12), transparent 18%),
                linear-gradient(160deg, #020617 0%, #111827 45%, #172554 100%);
            color: #fff;
            min-height: 100vh;
        }

        .glass {
            background: linear-gradient(160deg, rgba(15, 23, 42, .96), rgba(30, 41, 59, .92));
            border: 1px solid var(--line);
            border-radius: 28px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, .45);
        }

        .small-note {
            color: var(--muted);
            font-size: .95rem;
        }

        .form-control,
        .form-select {
            background: rgba(15, 23, 42, .75);
            color: #fff;
            border: 1px solid rgba(148, 163, 184, .22);
            border-radius: 14px;
        }

        .form-control::placeholder {
            color: #cbd5e1;
        }

        .form-control:focus {
            background: rgba(15, 23, 42, .88);
            color: #fff;
            box-shadow: 0 0 0 .2rem rgba(148, 163, 184, .18);
            border-color: rgba(148, 163, 184, .35);
        }

        .btn-submit {
            border-radius: 14px;
            padding: .85rem 1rem;
            font-weight: 700;
        }
    </style>
</head>

<body class="d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="glass p-4 p-md-5">
                    <a href="{{ url('/') }}"
                        class="text-decoration-none text-white d-flex align-items-center gap-2 mb-4">
                        <span
                            class="d-inline-flex align-items-center justify-content-center rounded-3 bg-light text-dark"
                            style="width:42px;height:42px;"><i class="bi bi-shop"></i></span>
                        <div>
                            <div class="fw-bold">La Tanza</div>
                            <small class="small-note">Sistem POS & Toko Modern</small>
                        </div>
                    </a>
                    <span class="badge rounded-pill px-3 py-2 mb-3"
                        style="background:rgba(56,189,248,0.12); color:#e0f2fe; border:1px solid rgba(56,189,248,0.25);">Akses
                        dashboard & POS</span>
                    <h2 class="fw-bold text-white mb-1">Selamat datang</h2>
                    <p class="small-note mb-4">Masuk untuk mengakses dashboard dan fitur toko Anda.</p>

                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger py-2 small mb-3">{{ $errors->first() }}</div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label small-note">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="admin@latanza.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label small-note">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4 small-note">
                            <label class="form-check-label"><input type="checkbox" name="remember" value="1"
                                    class="form-check-input me-2"> Ingat
                                saya</label>
                            <a href="#" class="text-decoration-none text-white-50">Lupa password?</a>
                        </div>
                        <button type="submit" class="btn btn-light w-100 btn-submit"
                            style="background:linear-gradient(135deg,#38bdf8,#6366f1); color:#fff; border:none;">Masuk</button>
                    </form>

                    <p class="small-note mt-4 mb-0 text-center">Belum punya akun? <a href="{{ route('register') }}"
                            class="text-white text-decoration-none fw-semibold">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
