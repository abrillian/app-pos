@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="mb-2 mb-md-0">
                <i class="bi bi-box-seam me-2 text-success"></i> Daftar Items
            </h4>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('items.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari item..." value="{{ request('search') }}">
                    <button class="btn btn-sm btn-outline-secondary ms-1">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('items.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle"></i> Tambah
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="table-success text-dark">
                    <tr>
                        <th>Nama</th>
                        <th>UOM/Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $i)
                        <tr>
                            <td class="fw-semibold">{{ $i->nama_item }}</td>
                            <td>{{ $i->uom }}</td>
                            <td>Rp {{ number_format($i->harga_beli,0,',','.') }}</td>
                            <td>Rp {{ number_format($i->harga_jual,0,',','.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('items.edit', $i) }}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form method="POST" action="{{ route('items.destroy', $i) }}" class="d-inline">
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
                            <td colspan="5" class="text-center text-muted">Belum ada data item</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $items->links() }}
    </div>

</div>

@endsection
