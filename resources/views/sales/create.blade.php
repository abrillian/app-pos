@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h3 class="mb-4">Buat Sale Baru</h3>

    <div class="row">
        <!-- Form Tambah Item ke Temp -->
        <div class="col-md-5">
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    Tambah Item
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sales.addTemp') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="item_id" class="form-label">Pilih Item</label>
                            <select class="form-select" id="item_id" name="item_id" required>
                                <option value="" disabled selected>-- Pilih Item --</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_item }} ({{ number_format($item->harga_jual) }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Tambah Item</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tampilkan Item Sementara -->
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-white">
                    Item Sementara
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Item</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse(\App\Models\TransactionTemp::where('session_id', session()->getId())->get() as $temp)
                                <tr>
                                    <td>{{ $temp->item->nama_item }}</td>
                                    <td>{{ $temp->quantity }}</td>
                                    <td>{{ number_format($temp->price) }}</td>
                                    <td>{{ number_format($temp->amount) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada item ditambahkan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Simpan Sale -->
    <div class="card mt-4 shadow-sm">
        <div class="card-header bg-success text-white">
            Simpan Sale
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Pilih Customer</label>
                   <select class="form-select text-dark" name="customer_id" id="customer_id" required>
    <option value="" disabled selected>-- Pilih Customer --</option>
    @foreach($customers as $c)
        <option value="{{ $c->id }}">{{ $c->name }}</option>
    @endforeach
</select>

                </div>
                <button type="submit" class="btn btn-success w-100">Simpan Sale</button>
            </form>
        </div>
    </div>
</div>

@endsection
