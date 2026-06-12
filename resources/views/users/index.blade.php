@extends('main')

@section('title')
    <h1><i class="bi bi-people-fill me-2"></i>Manajemen User</h1>
@endsection

@section('content')
<div class="card border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="mb-0 fw-bold text-primary">Daftar User</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Tambah User</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Terdaftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <div class="avatar-circle bg-soft-primary" style="width:38px; height:38px; font-size:0.9rem;">
                            {{ strtoupper(substr($item->name, 0, 1)) }}
                        </div>
                        <span class="fw-bold">{{ $item->name }}</span>
                    </div>
                </td>
                <td>{{ $item->email }}</td>
                <td>
                    @if ($item->role === 'superadmin')
                        <span class="badge bg-danger bg-opacity-75 px-3 py-2" style="border-radius:8px;">Superadmin</span>
                    @else
                        <span class="badge-soft-primary">Admin</span>
                    @endif
                </td>
                <td>{{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-outline-secondary btn-sm"><i class="bi bi-pencil"></i></a>
                        @if ($item->id !== auth()->id())
                        <form method="POST" action="{{ route('users.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="btn btn-outline-danger btn-sm show_confirm"
                                data-toggle="tooltip" title='Delete'
                                data-nama='{{ $item->name }}'><i class="bi bi-trash"></i></button>
                        </form>
                        @endif
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
