@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Users</h3>
        <a href="{{ route('users.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Tambah Petugas
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $u)
                        <tr>
                            <td>{{ $u->nama_user }}</td>
                            <td>{{ $u->username }}</td>
                            <td>{{ $u->level->level ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('users.edit', $u) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('users.destroy', $u) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bi bi-trash"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data user</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $users->links() }}
    </div>

</div>

@endsection
