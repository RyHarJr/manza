@extends('main')

@section('title')
    <h1><i class="bi bi-pencil-square me-2"></i>Edit Detail Transaksi</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card border-0 p-4">
            <h5 class="fw-bold text-primary mb-4">Edit Detail Transaksi</h5>
            <form action="{{ route('detail-transaksi.update', $detailTransaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-select" id="produk_id" name="produk_id" required>
                <option value="" disabled>Pilih Produk</option>
                @foreach ($produks as $p)
                    <option value="{{ $p->id }}" {{ old('produk_id', $detailTransaksi->produk_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->NamaProduk }} - Rp {{ number_format($p->Harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            @error('produk_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="transaksi_id" class="form-label">Transaksi</label>
            <select class="form-select" id="transaksi_id" name="transaksi_id" required>
                <option value="" disabled>Pilih Transaksi</option>
                @foreach ($transaksis as $t)
                    <option value="{{ $t->id }}" {{ old('transaksi_id', $detailTransaksi->transaksi_id) == $t->id ? 'selected' : '' }}>
                        #{{ $t->id }} - {{ \Carbon\Carbon::parse($t->created_at)->format('d M Y, H:i') }}
                    </option>
                @endforeach
            </select>
            @error('transaksi_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah"
                value="{{ old('jumlah', $detailTransaksi->jumlah) }}" min="1" required>
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

                <div class="d-flex gap-2 mt-4">
                    <a href="{{ route('detail-transaksi.index') }}" class="btn btn-light px-4"><i class="bi bi-arrow-left me-1"></i> Batal</a>
                    <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
    <p>RyHar</p>
@endsection
