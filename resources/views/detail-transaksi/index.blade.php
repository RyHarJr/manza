@extends('main')

@section('title')
    <h1><i class="bi bi-clipboard-data me-2"></i>Data Detail Transaksi</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <a href="{{ route('detail-transaksi.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Manual</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Transaksi (Struk)</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Transaksi ? \Carbon\Carbon::parse($item->Transaksi->created_at)->format('d M Y, H:i') : '-' }}</td>
                <td>{{ $item->Produk->NamaProduk ?? '-' }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('detail-transaksi.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('detail-transaksi.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='Detail #{{ $item->id }}'><i class="bi bi-trash"></i></button>
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
