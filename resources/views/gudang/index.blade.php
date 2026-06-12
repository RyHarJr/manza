@extends('main')

@section('title')
    <h1><i class="bi bi-house-door me-2"></i>Data Gudang</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <a href="{{ route('gudang.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Pemasok</th>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->Pemasok->NamaPemasok ?? '-' }}</td>
                <td>{{ $item->Produk->NamaProduk ?? '-' }}</td>
                <td>{{ $item->Jumlah }}</td>
                <td>Rp {{ number_format($item->Harga, 2, ',', '.') }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('gudang.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('gudang.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='Gudang #{{ $item->id }}'><i class="bi bi-trash"></i></button>
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
