@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="mb-2 mb-md-0">
                <i class="bi bi-receipt me-2 text-info"></i> Daftar Sales
            </h4>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('sales.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari sales..." value="{{ request('search') }}">
                    <button class="btn btn-sm btn-outline-secondary ms-1">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="{{ route('sales.create') }}" class="btn btn-info">
                    <i class="bi bi-plus-circle"></i> Buat Transaksi
                </a>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="table-info text-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>DO Number</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $s)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($s->tgl_sales)->format('d M Y') }}</td>
                            <td>{{ $s->customer->nama_customer ?? '-' }}</td>
                            <td>{{ $s->do_number }}</td>
                            <td>
                                <span class="badge {{ $s->status == 'final' ? 'bg-success' : 'bg-warning text-dark' }}">
                                    {{ ucfirst($s->status) }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('sales.show', $s) }}" class="btn btn-sm btn-outline-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data sales</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $sales->links() }}
    </div>

</div>

@endsection
