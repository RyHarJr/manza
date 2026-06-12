@extends('main')

@section('title')
    <h1><i class="bi bi-box-seam me-2"></i>Data Produk</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <a href="{{ route('produk.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($item->Foto)
                        <img src="{{ asset('storage/' . $item->Foto) }}" alt="Foto"
                            style="max-height: 60px; border-radius: 6px;">
                    @else
                        <span class="text-muted"><i class="bi bi-image"></i></span>
                    @endif
                </td>
                <td>{{ $item->KategoriProduk }}</td>
                <td>{{ $item->NamaProduk }}</td>
                <td>{{ $item->Deskripsi }}</td>
                <td>Rp {{ number_format($item->Harga, 2, ',', '.') }}</td>
                <td>{{ $item->Satuan }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('produk.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->NamaProduk }}'><i class="bi bi-trash"></i></button>
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
    <p>Latanza</p>
@endsection
