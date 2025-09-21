@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="mb-2 mb-md-0">
                <i class="bi bi-people-fill me-2 text-primary"></i> Daftar Customers
            </h4>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('customers.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari customer..." value="{{ request('search') }}">
                    <button class="btn btn-sm btn-outline-secondary ms-1"><i class="bi bi-search"></i></button>
                </form>
                <a href="{{ route('customers.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="table-primary text-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telp</th>
                        <th>Fax</th>
                        <th>Email</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $c)
                        <tr>
                            <td class="fw-semibold">{{ $c->nama_customer }}</td>
                            <td>{{ $c->alamat }}</td>
                            <td>{{ $c->telp }}</td>
                            <td>{{ $c->fax }}</td>
                            <td>{{ $c->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('customers.edit', $c) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('customers.destroy', $c) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data customer</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $customers->links() }}
    </div>

</div>

@endsection
