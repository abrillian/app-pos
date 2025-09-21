@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Detail Sales</h3>

    <!-- Info Sales -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-light">
            Informasi Sales
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Customer:</strong> {{ $sale->customer->nama_customer ?? '-' }}</li>
                <li class="list-group-item"><strong>DO Number:</strong> {{ $sale->do_number }}</li>
                <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($sale->tgl_sales)->format('d M Y') }}</li>
                <li class="list-group-item">
                    <strong>Status:</strong> 
                    <span class="badge {{ $sale->status == 'final' ? 'bg-success' : 'bg-warning text-dark' }}">
                        {{ ucfirst($sale->status) }}
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            Daftar Transaksi
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sale->transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->item->nama_item ?? '-' }}</td>
                            <td class="text-center">{{ $transaction->quantity }}</td>
                            <td class="text-end">{{ number_format($transaction->price) }}</td>
                            <td class="text-end">{{ number_format($transaction->amount) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
                @if($sale->transactions->count())
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total</th>
                        <th class="text-end">{{ number_format($sale->transactions->sum('amount')) }}</th>
                    </tr>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>

@endsection
