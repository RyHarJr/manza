@extends('main')

@section('title')
    <h1><i class="bi bi-plus-circle me-2"></i>Tambah Pelanggan</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-primary mb-4">Tambah Data Pelanggan</h5>
            <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="NamaPelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="NamaPelanggan" name="NamaPelanggan"
                value="{{ old('NamaPelanggan') }}" required>
            @error('NamaPelanggan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat"
                value="{{ old('Alamat') }}" required>
            @error('Alamat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="NoTlp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" id="NoTlp" name="NoTlp"
                value="{{ old('NoTlp') }}" maxlength="14" required>
            @error('NoTlp')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="TglDaftar" class="form-label">Tanggal Daftar</label>
            <input type="date" class="form-control" id="TglDaftar" name="TglDaftar"
                value="{{ old('TglDaftar') }}" required>
            @error('TglDaftar')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
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
