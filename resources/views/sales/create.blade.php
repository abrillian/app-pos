@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h2 class="fw-bold mb-4 text-center text-primary">
        <i class="bi bi-cart-check"></i> Buat Sale Baru
    </h2>

    <!-- Bagian Simpan Sale di Atas -->
    <div class="card border-0 shadow-lg rounded-4 mb-4">
        <div class="card-header bg-success text-white rounded-top-4">
            <i class="bi bi-person-check"></i> Pilih Customer
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label for="customer_id" class="form-label fw-semibold">Customer</label>
                        <select class="form-select shadow-sm" name="customer_id" id="customer_id" required>
                            <option value="" disabled selected>-- Pilih Customer --</option>
                            @foreach($customers as $c)
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success w-100 rounded-pill shadow">
                            <i class="bi bi-save"></i> Simpan Sale
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bagian Tambah Item -->
    <div class="card border-0 shadow-lg rounded-4 mb-4">
        <div class="card-header bg-primary text-white rounded-top-4">
            <i class="bi bi-bag-plus"></i> Tambah Item
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.addTemp') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="item_id" class="form-label fw-semibold">Pilih Item</label>
                        <select class="form-select shadow-sm" id="item_id" name="item_id" required>
                            <option value="" disabled selected>-- Pilih Item --</option>
                            @foreach($items as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->nama_item }} (Rp {{ number_format($item->harga_jual) }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="quantity" class="form-label fw-semibold">Jumlah</label>
                        <input type="number" class="form-control shadow-sm" name="quantity" id="quantity" value="1" min="1" required>
                    </div>
                    <div class="col-md-3 d-grid">
                        <button type="submit" class="btn btn-primary rounded-pill shadow mt-4">
                            <i class="bi bi-plus-circle"></i> Tambah
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bagian Daftar Item -->
    <div class="card border-0 shadow-lg rounded-4">
        <div class="card-header bg-secondary text-white rounded-top-4">
            <i class="bi bi-list-ul"></i> Item Sementara
        </div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Item</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse(\App\Models\TransactionTemp::where('session_id', session()->getId())->get() as $temp)
                        <tr>
                            <td>{{ $temp->item->nama_item }}</td>
                            <td class="text-center">{{ $temp->quantity }}</td>
                            <td class="text-end">Rp {{ number_format($temp->price) }}</td>
                            <td class="text-end fw-bold text-success">Rp {{ number_format($temp->amount) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-3">
                                <i class="bi bi-inbox"></i> Belum ada item ditambahkan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
