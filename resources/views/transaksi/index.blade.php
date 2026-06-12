@extends('main')

@section('title')
    <h1><i class="bi bi-receipt me-2"></i>Data Transaksi</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 fw-bold text-primary">Riwayat Transaksi</h5>
        <a href="{{ route('transaksi.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Manual</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Karyawan</th>
                    <th>Pelanggan</th>
                    <th>Waktu Transaksi</th>
                    <th>Total Harga</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Karyawan->NamaKaryawan ?? '-' }}</td>
                <td><span class="badge bg-light text-dark border">{{ $item->Pelanggan->NamaPelanggan ?? 'Umum (Non-Member)' }}</span></td>
                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, H:i') }}</td>
                <td>Rp {{ number_format($item->TotalHarga, 2, ',', '.') }}</td>
                <td>{{ $item->MetodePembayaran }}</td>
                <td>
                    @if ($item->StatusPembayaran == 'sukses')
                        <span class="badge bg-success">Sukses</span>
                    @elseif ($item->StatusPembayaran == 'proses')
                        <span class="badge bg-warning text-dark">Proses</span>
                    @else
                        <span class="badge bg-danger">Gagal</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('transaksi.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('transaksi.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='Transaksi #{{ $item->id }}'><i class="bi bi-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('footer')
    <p>RyHar</p>
@endsection
