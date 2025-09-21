@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h4 class="mb-3">Detail Transaction</h4>

    <div class="card border shadow-sm">
        <div class="card-header bg-light">
            Informasi Transaction
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Sale ID:</strong> {{ $transaction->sale->id }}
                </li>
                <li class="list-group-item">
                    <strong>Customer:</strong> {{ $transaction->sale->customer->nama_customer }}
                </li>
                <li class="list-group-item">
                    <strong>Item:</strong> {{ $transaction->item->nama_item }}
                </li>
                <li class="list-group-item">
                    <strong>Quantity:</strong> {{ $transaction->quantity }}
                </li>
                <li class="list-group-item">
                    <strong>Price:</strong> {{ number_format($transaction->price) }}
                </li>
                <li class="list-group-item">
                    <strong>Amount:</strong> {{ number_format($transaction->amount) }}
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection
