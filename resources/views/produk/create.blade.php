@extends('main')

@section('title')
    <h1><i class="bi bi-plus-circle me-2"></i>Tambah Produk</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-primary mb-4">Tambah Data Produk</h5>
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="KategoriProduk" class="form-label">Kategori Produk</label>
            <select class="form-select" id="KategoriProduk" name="KategoriProduk" required>
                <option value="" disabled selected>Pilih Kategori</option>
                <option value="Makanan" {{ old('KategoriProduk') == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                <option value="Minuman" {{ old('KategoriProduk') == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                <option value="Snack" {{ old('KategoriProduk') == 'Snack' ? 'selected' : '' }}>Snack</option>
                <option value="Bumbu" {{ old('KategoriProduk') == 'Bumbu' ? 'selected' : '' }}>Bumbu</option>
                <option value="Sembako" {{ old('KategoriProduk') == 'Sembako' ? 'selected' : '' }}>Sembako</option>
                <option value="Peralatan" {{ old('KategoriProduk') == 'Peralatan' ? 'selected' : '' }}>Peralatan</option>
                <option value="Lainnya" {{ old('KategoriProduk') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('KategoriProduk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="NamaProduk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="NamaProduk" name="NamaProduk"
                value="{{ old('NamaProduk') }}" required>
            @error('NamaProduk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="Deskripsi" name="Deskripsi"
                value="{{ old('Deskripsi') }}" required>
            @error('Deskripsi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="Harga" name="Harga"
                value="{{ old('Harga') }}" step="0.01" min="0" required>
            @error('Harga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Satuan" class="form-label">Satuan</label>
            <select class="form-select" id="Satuan" name="Satuan" required>
                <option value="" disabled selected>Pilih Satuan</option>
                <option value="Pcs" {{ old('Satuan') == 'Pcs' ? 'selected' : '' }}>Pcs</option>
                <option value="Kg" {{ old('Satuan') == 'Kg' ? 'selected' : '' }}>Kg</option>
                <option value="Liter" {{ old('Satuan') == 'Liter' ? 'selected' : '' }}>Liter</option>
                <option value="Dus" {{ old('Satuan') == 'Dus' ? 'selected' : '' }}>Dus</option>
                <option value="Pack" {{ old('Satuan') == 'Pack' ? 'selected' : '' }}>Pack</option>
                <option value="Botol" {{ old('Satuan') == 'Botol' ? 'selected' : '' }}>Botol</option>
                <option value="Sachet" {{ old('Satuan') == 'Sachet' ? 'selected' : '' }}>Sachet</option>
                <option value="Box" {{ old('Satuan') == 'Box' ? 'selected' : '' }}>Box</option>
            </select>
            @error('Satuan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Foto" class="form-label">Foto Produk</label>
            <input type="file" class="form-control" id="Foto" name="Foto" accept="image/*">
            <small class="text-muted">Format: JPEG, PNG, JPG, GIF. Maks 2MB.</small>
            @error('Foto')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('produk.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <p>Latanza</p>
@endsection
