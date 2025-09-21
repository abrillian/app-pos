@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Customers</h3>
        <a href="{{ route('customers.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Tambah Customer
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
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
                            <td>{{ $c->nama_customer }}</td>
                            <td>{{ $c->alamat }}</td>
                            <td>{{ $c->telp }}</td>
                            <td>{{ $c->fax }}</td>
                            <td>{{ $c->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('customers.edit', $c) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('customers.destroy', $c) }}" style="display:inline">
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
                            <td colspan="6" class="text-center">Belum ada data customer</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $customers->links() }}
    </div>

</div>

@endsection
