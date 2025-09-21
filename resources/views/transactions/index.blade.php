@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Transactions</h3>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
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
                            <td>{{ $t->sale->id }}</td>
                            <td>{{ $t->item->nama_item ?? '-' }}</td>
                            <td>{{ $t->quantity }}</td>
                            <td>{{ number_format($t->price) }}</td>
                            <td>{{ number_format($t->amount) }}</td>
                            <td class="text-center">
                                <a href="{{ route('transactions.show', $t) }}" class="btn btn-sm btn-info" title="Detail">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <form method="POST" action="{{ route('transactions.destroy', $t) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $transactions->links() }}
    </div>

</div>

@endsection
