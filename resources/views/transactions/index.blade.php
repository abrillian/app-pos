@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center">
            <h4 class="mb-2 mb-md-0">
                <i class="bi bi-cash-coin me-2 text-primary"></i> Daftar Transactions
            </h4>
            <div class="d-flex gap-2">
                <form method="GET" action="{{ route('transactions.index') }}" class="d-flex">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari transaction..." value="{{ request('search') }}">
                    <button class="btn btn-sm btn-outline-secondary ms-1">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-borderless align-middle mb-0">
                <thead class="table-primary text-dark">
                    <tr>
                        <th>Sale ID</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $t)
                        <tr>
                            <td>{{ $t->sale->id ?? '-' }}</td>
                            <td>{{ $t->item->nama_item ?? '-' }}</td>
                            <td>{{ $t->quantity }}</td>
                            <td>{{ number_format($t->price) }}</td>
                            <td>{{ number_format($t->amount) }}</td>
                            <td class="text-center">
                                <a href="{{ route('transactions.show', $t) }}" class="btn btn-sm btn-outline-info" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form method="POST" action="{{ route('transactions.destroy', $t) }}" class="d-inline">
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
                            <td colspan="6" class="text-center text-muted">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $transactions->links() }}
    </div>

</div>

@endsection
