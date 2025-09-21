@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Detail Transaction</h3>

    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            Informasi Transaction
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4"><strong>Sale ID:</strong></div>
                <div class="col-md-8">{{ $transaction->sale->id }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Customer:</strong></div>
                <div class="col-md-8">{{ $transaction->sale->customer->nama_customer }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Item:</strong></div>
                <div class="col-md-8">{{ $transaction->item->nama_item }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Quantity:</strong></div>
                <div class="col-md-8">{{ $transaction->quantity }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Price:</strong></div>
                <div class="col-md-8">{{ number_format($transaction->price) }}</div>
            </div>
            <div class="row mb-2">
                <div class="col-md-4"><strong>Amount:</strong></div>
                <div class="col-md-8">{{ number_format($transaction->amount) }}</div>
            </div>
        </div>
    </div>
</div>

@endsection
