@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h2 class="mb-4">Detail Sales</h2>

    <!-- Info Sales -->
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            Informasi Sales
        </div>
        <div class="card-body">
            <p><strong>Customer:</strong> {{ $sale->customer->nama_customer ?? '-' }}</p>
            <p><strong>DO Number:</strong> {{ $sale->do_number }}</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($sale->tgl_sales)->format('d M Y') }}</p>
            <p><strong>Status:</strong> 
                <span class="badge {{ $sale->status == 'final' ? 'bg-success' : 'bg-warning' }}">
                    {{ ucfirst($sale->status) }}
                </span>
            </p>
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            Daftar Transaksi
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sale->transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->item->nama_item ?? '-' }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>{{ number_format($transaction->price) }}</td>
                            <td>{{ number_format($transaction->amount) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada transaksi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
