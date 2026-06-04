@extends('main')

@section('title')
    <h1><i class="bi bi-plus-circle me-2"></i>Tambah Karyawan</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-slate mb-4">Tambah Data Karyawan</h5>
            <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="NamaKaryawan" class="form-label">Nama Karyawan</label>
            <input type="text" class="form-control" id="NamaKaryawan" name="NamaKaryawan"
                value="{{ old('NamaKaryawan') }}" required>
            @error('NamaKaryawan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Jabatan" class="form-label">Jabatan</label>
            <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                value="{{ old('Jabatan') }}" required>
            @error('Jabatan')
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
            <label for="TglMasuk" class="form-label">Tanggal Masuk</label>
            <input type="date" class="form-control" id="TglMasuk" name="TglMasuk"
                value="{{ old('TglMasuk') }}" required>
            @error('TglMasuk')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('karyawan.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
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
