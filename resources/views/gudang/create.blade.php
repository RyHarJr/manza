@extends('main')

@section('title')
    <h1><i class="bi bi-plus-circle me-2"></i>Tambah Gudang</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-slate mb-4">Tambah Data Gudang</h5>
            <form action="{{ route('gudang.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="pemasok_id" class="form-label">Pemasok</label>
            <select class="form-select" id="pemasok_id" name="pemasok_id" required>
                <option value="" disabled selected>Pilih Pemasok</option>
                @foreach ($pemasoks as $p)
                    <option value="{{ $p->id }}" {{ old('pemasok_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->NamaPemasok }}
                    </option>
                @endforeach
            </select>
            @error('pemasok_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-select" id="produk_id" name="produk_id" required>
                <option value="" disabled selected>Pilih Produk</option>
                @foreach ($produks as $p)
                    <option value="{{ $p->id }}" {{ old('produk_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->NamaProduk }}
                    </option>
                @endforeach
            </select>
            @error('produk_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="Jumlah" name="Jumlah"
                value="{{ old('Jumlah') }}" min="0" required>
            @error('Jumlah')
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

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('gudang.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                    <button type="submit" class="btn btn-dark px-4"><i class="bi bi-save me-1"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <p>RyHar</p>
@endsection
