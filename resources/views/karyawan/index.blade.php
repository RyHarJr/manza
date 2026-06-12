@extends('main')

@section('title')
    <h1><i class="bi bi-person-badge me-2"></i>Data Karyawan</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah Data</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>No. Telp</th>
                    <th>Tgl Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->NamaKaryawan }}</td>
                <td>{{ $item->Jabatan }}</td>
                <td>{{ $item->NoTlp }}</td>
                <td>{{ $item->TglMasuk ? \Carbon\Carbon::parse($item->TglMasuk)->format('d M Y') : '-' }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="{{ route('karyawan.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->NamaKaryawan }}'><i class="bi bi-trash"></i></button>
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
