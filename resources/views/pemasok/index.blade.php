@extends('main')

@section('title')
    <h1><i class="bi bi-truck me-2"></i>Data Pemasok</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 fw-bold text-primary">Daftar Pemasok</h5>
        <a href="{{ route('pemasok.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pemasok</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Kontak Person</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->NamaPemasok }}</td>
                <td>{{ $item->Alamat }}</td>
                <td>{{ $item->NoTlp }}</td>
                <td>{{ $item->KontakPerson }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('pemasok.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('pemasok.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->NamaPemasok }}'><i class="bi bi-trash"></i></button>
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
