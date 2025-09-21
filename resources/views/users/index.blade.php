@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="card border-0 shadow">
        <div class="card-header d-flex justify-content-between align-items-center bg-white">
            <h5 class="mb-0">Data User</h5>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-person-plus"></i> Tambah User
            </a>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th style="width: 30%">Nama</th>
                        <th style="width: 25%">Username</th>
                        <th style="width: 20%">Level</th>
                        <th style="width: 25%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr>
                            <td>{{ $u->nama_user }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->level->level ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $u) }}" class="btn btn-outline-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form method="POST" action="{{ route('users.destroy', $u) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">Belum ada user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3 d-flex justify-content-end">
        {{ $users->links() }}
    </div>

</div>

@endsection
