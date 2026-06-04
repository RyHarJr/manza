@extends('main')

@section('title')
    <h1><i class="bi bi-plus-circle me-2"></i>Tambah Transaksi</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-slate mb-4">Tambah Data Transaksi</h5>
            <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label>
            <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                <option value="" disabled selected>Pilih Karyawan</option>
                @foreach ($karyawans as $k)
                    <option value="{{ $k->id }}" {{ old('karyawan_id') == $k->id ? 'selected' : '' }}>
                        {{ $k->NamaKaryawan }}
                    </option>
                @endforeach
            </select>
            @error('karyawan_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="TglTransaksi" class="form-label">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="TglTransaksi" name="TglTransaksi"
                value="{{ old('TglTransaksi') }}" required>
            @error('TglTransaksi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="TotalHarga" class="form-label">Total Harga</label>
            <input type="number" class="form-control" id="TotalHarga" name="TotalHarga"
                value="{{ old('TotalHarga') }}" step="0.01" min="0" required>
            @error('TotalHarga')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="MetodePembayaran" class="form-label">Metode Pembayaran</label>
            <select class="form-select" id="MetodePembayaran" name="MetodePembayaran" required>
                <option value="" disabled selected>Pilih Metode</option>
                <option value="Cash" {{ old('MetodePembayaran') == 'Cash' ? 'selected' : '' }}>Cash</option>
                <option value="Transfer" {{ old('MetodePembayaran') == 'Transfer' ? 'selected' : '' }}>Transfer</option>
                <option value="QRIS" {{ old('MetodePembayaran') == 'QRIS' ? 'selected' : '' }}>QRIS</option>
            </select>
            @error('MetodePembayaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="StatusPembayaran" class="form-label">Status Pembayaran</label>
            <select class="form-select" id="StatusPembayaran" name="StatusPembayaran" required>
                <option value="" disabled selected>Pilih Status</option>
                <option value="sukses" {{ old('StatusPembayaran') == 'sukses' ? 'selected' : '' }}>Sukses</option>
                <option value="proses" {{ old('StatusPembayaran') == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="gagal" {{ old('StatusPembayaran') == 'gagal' ? 'selected' : '' }}>Gagal</option>
            </select>
            @error('StatusPembayaran')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
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
