@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Sales</h3>
        <a href="{{ route('sales.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Buat Transaksi
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
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
                                <a href="{{ route('sales.show', $s) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data sales</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $sales->links() }}
    </div>

</div>

@endsection
