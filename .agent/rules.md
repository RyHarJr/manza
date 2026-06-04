# Laravel App — Agent Rules

> Aturan ini **WAJIB** diikuti oleh agent saat membuat, mengedit, atau menambahkan fitur di project ini.

---

## 1. Tech Stack

| Layer | Teknologi |
|---|---|
| Framework | **Laravel 12** (PHP) |
| Template Engine | **Blade** |
| CSS Framework | **Bootstrap 5** |
| Admin Template | **AdminLTE 4** |
| Database | **SQLite** (via `database/database.sqlite`) |
| JS Library | **jQuery** (untuk SweetAlert delete confirmation) |
| Build Tool  | **Vite** |

---

## 2. Struktur Direktori

```
laravel-app/
├── app/
│   ├── Http/
│   │   └── Controllers/       ← Resource Controller (CRUD)
│   ├── Models/                ← Eloquent Model
│   └── Providers/
├── database/
│   ├── migrations/            ← Migration file (anonymous class)
│   ├── factories/
│   └── seeders/
├── resources/
│   └── views/
│       ├── main.blade.php     ← Layout utama (AdminLTE)
│       ├── dashboard.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       ├── fakultas/          ← Views per-modul (index, create, edit)
│       ├── prodi/
│       ├── periode/
│       ├── berita/
│       └── mahasiswa/
├── routes/
│   └── web.php                ← Route definitions (Route::resource)
├── public/
│   ├── css/adminlte.css
│   └── assets/img/
└── config/
```

---

## 3. Naming Conventions

### 3.1 Model
- Nama class: **PascalCase singular** → `Mahasiswa`, `Fakultas`, `Prodi`
- Nama file: **PascalCase** → `Mahasiswa.php`, `Fakultas.php`
- Namespace: `App\Models`

### 3.2 Controller
- Nama class: **PascalCase + `Controller` suffix** → `MahasiswaController`, `FakultasController`
- Nama file: sesuai class → `MahasiswaController.php`
- Namespace: `App\Http\Controllers`
- Tipe: **Resource Controller** (7 method CRUD)

### 3.3 Migration
- Format nama: `YYYY_MM_DD_HHMMSS_create_{nama_tabel}_table.php`
- Nama tabel: **plural snake_case** → `mahasiswas`, `fakultas`, `prodis`, `beritas`
- Menggunakan **anonymous class** (`return new class extends Migration`)

### 3.4 Blade Views
- Nama folder: **singular lowercase** sesuai nama modul → `mahasiswa/`, `fakultas/`, `prodi/`
- Setiap modul CRUD memiliki 3 file:
  - `index.blade.php` — Daftar data (tabel)
  - `create.blade.php` — Form tambah data
  - `edit.blade.php` — Form edit data

### 3.5 Route
- Suffix: `.index`, `.create`, `.store`, `.show`, `.edit`, `.update`, `.destroy`
- Prefix URL: sesuai nama modul → `/mahasiswa`, `/fakultas`, `/prodi`

---

## 4. Pola Kode (Code Patterns)

### 4.1 Model (Eloquent)

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NamaModel extends Model
{
    protected $fillable = [
        'kolom_1',
        'kolom_2',
        'foreign_key_id',
    ];

    // Relasi belongsTo
    public function NamaParent()
    {
        return $this->belongsTo(ParentModel::class);
    }

    // Relasi hasMany
    public function namaChildren()
    {
        return $this->hasMany(ChildModel::class);
    }
}
```

**Aturan Model:**
- Selalu definisikan `$fillable` untuk mass assignment
- Relasi `belongsTo` → nama method **PascalCase** (contoh: `Prodi()`, `Fakultas()`)
- Relasi `hasMany` → nama method **camelCase plural** (contoh: `mahasiswa()`, `prodis()`)
- JANGAN gunakan `$guarded`

### 4.2 Controller (Resource)

```php
<?php

namespace App\Http\Controllers;

use App\Models\NamaModel;
use Illuminate\Http\Request;

class NamaModelController extends Controller
{
    public function index()
    {
        $items = NamaModel::all();
        return view('namaModul.index', compact('items'));
    }

    public function create()
    {
        return view('namaModul.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kolom_1' => 'required|string|max:100',
            'kolom_2' => 'required',
        ]);

        NamaModel::create($request->all());

        return redirect()->route('namaModul.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(NamaModel $namaModel)
    {
        //
    }

    public function edit(NamaModel $namaModel)
    {
        return view('namaModul.edit', compact('namaModel'));
    }

    public function update(Request $request, NamaModel $namaModel)
    {
        $request->validate([
            'kolom_1' => 'required|string|max:100',
        ]);

        $namaModel->update($request->all());

        return redirect()->route('namaModul.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(NamaModel $namaModel)
    {
        $namaModel->delete();

        return redirect()->route('namaModul.index')->with('success', 'Data berhasil dihapus.');
    }
}
```

**Aturan Controller:**
- Selalu gunakan **7 method standar**: `index`, `create`, `store`, `show`, `edit`, `update`, `destroy`
- Validasi dilakukan di `store()` dan `update()` menggunakan `$request->validate()`
- Redirect ke `route('modul.index')` setelah store/update/destroy
- Flash message selalu menggunakan `->with('success', '...')`
- Untuk file upload: gunakan `$request->file()->storeAs()` atau `->store()` dengan disk `public`
- Jika ada file lama, hapus pakai `Storage::disk('public')->delete()`

### 4.3 Migration

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nama_tabels', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('kolom_1', 100);
            $table->string('kolom_2', 5);
            $table->foreignId('parent_id')->constrained('parents')->onDelete('cascade');
            $table->string('foto')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nama_tabels');
    }
};
```

**Aturan Migration:**
- Selalu gunakan `$table->id()` dan `$table->timestamps()` di awal
- Foreign key: gunakan `foreignId()->constrained()->onDelete('cascade')`
- Field nullable: tambahkan `->nullable()`
- Gunakan `string` dengan max length, bukan text
- Method `down()` selalu berisi `Schema::dropIfExists()`

### 4.4 Blade View — Layout

Semua view **WAJIB** meng-extend layout utama `main.blade.php`:

```blade
@extends('main')

@section('title')
    <h1>Judul Halaman</h1>
@endsection

@section('content')
    {{-- Konten utama di sini --}}
@endsection

@section('footer')
    <p>RyHar</p>
@endsection
```

**Section yang tersedia:**
| Section | Fungsi |
|---|---|
| `@section('title')` | Judul di card header |
| `@section('content')` | Konten utama di card body |
| `@section('footer')` | Konten di card footer |

### 4.5 Blade View — Index (Daftar Data)

```blade
@extends('main')

@section('title')
    <h1>Data NamaModul</h1>
@endsection

@section('content')
    <a href={{ route('modul.create') }} class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-border table-hover" border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kolom 1</th>
            <th>Kolom 2</th>
            <th>Aksi</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kolom_1 }}</td>
                <td>{{ $item->kolom_2 }}</td>
                <td class="d-flex d-inline gap-2">
                    <a href="{{ route('modul.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ route('modul.destroy', $item->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-rounded show_confirm"
                            data-toggle="tooltip" title='Delete'
                            data-nama='{{ $item->nama }}'>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
    <p>RyHar</p>
@endsection
```

### 4.6 Blade View — Create & Edit (Form)

```blade
@extends('main')

@section('title')
    <h1>Form Tambah/Edit Data</h1>
@endsection

@section('content')
    <a href="{{ route('modul.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <form action="{{ route('modul.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="kolom_1" class="form-label">Label Kolom</label>
            <input type="text" class="form-control" id="kolom_1" name="kolom_1"
                value="{{ old('kolom_1') }}" required>
            @error('kolom_1')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="relasi_id" class="form-label">Pilih Relasi</label>
            <select class="form-select" id="relasi_id" name="relasi_id" required>
                <option value="" disabled selected>Pilih Opsi</option>
                @foreach ($relasiItems as $r)
                    <option value="{{ $r->id }}" {{ old('relasi_id') == $r->id ? 'selected' : '' }}>
                        {{ $r->nama }}
                    </option>
                @endforeach
            </select>
            @error('relasi_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
```

**Aturan Form:**
- Gunakan Bootstrap 5 classes: `form-control`, `form-select`, `form-label`, `mb-3`
- Validasi error: pakai `@error('field')` dengan class `text-danger`
- Isi value dengan `old('field')` untuk create, dan `$model->field` untuk edit
- File upload: tambahkan `enctype="multipart/form-data"` pada `<form>`
- Form edit: tambahkan `@method('PUT')` setelah `@csrf`

---

## 5. Routing

```php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NamaController;

Route::get('/', fn() => redirect()->route('dashboard'));
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('namaModul', NamaController::class);
```

**Aturan Routing:**
- Gunakan `Route::resource()` untuk setiap modul CRUD
- Halaman utama `/` redirect ke dashboard
- Import semua Controller di atas file

---

## 6. Sidebar Navigation

Saat menambahkan modul baru, **WAJIB** menambahkan menu item di sidebar dalam `resources/views/main.blade.php`:

```blade
<li class="nav-item">
    <a href={{ route('modul.index') }} class="nav-link">
        <i class="bi bi-icon-name"></i>
        <p>Nama Modul</p>
    </a>
</li>
```

Gunakan **Bootstrap Icons** (`bi bi-*`) untuk icon sidebar.

---

## 7. Delete Confirmation

Semua tombol hapus **WAJIB** menggunakan SweetAlert confirmation yang sudah ada di `main.blade.php`:

- Tombol harus memiliki class `show_confirm`
- Tombol harus memiliki attribute `data-nama` berisi nama item yang akan dihapus
- Form harus menggunakan `method="POST"` dengan hidden `_method="DELETE"`

---

## 8. Checklist Saat Menambah Modul CRUD Baru

Saat diminta membuat modul/fitur CRUD baru, ikuti urutan ini:

1. [ ] **Migration** — Buat file migration di `database/migrations/`
2. [ ] **Model** — Buat model di `app/Models/` dengan `$fillable` dan relasi
3. [ ] **Controller** — Buat resource controller di `app/Http/Controllers/`
4. [ ] **Views** — Buat 3 file blade di `resources/views/{modul}/`:
   - `index.blade.php`
   - `create.blade.php`
   - `edit.blade.php`
5. [ ] **Route** — Tambahkan `Route::resource()` di `routes/web.php`
6. [ ] **Sidebar** — Tambahkan menu di `resources/views/main.blade.php`
7. [ ] **Run Migration** — `php artisan migrate`

---

## 9. Bahasa & UI

- Teks UI menggunakan **Bahasa Indonesia** (contoh: "Tambah", "Edit", "Hapus", "Simpan", "Kembali")
- Flash message: Bahasa Indonesia (contoh: "Data berhasil ditambahkan.")
- Komentar kode boleh Bahasa Inggris atau Indonesia
- Footer card: `<p>RyHar</p>`
