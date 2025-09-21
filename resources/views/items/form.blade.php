@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-box-seam me-2"></i> 
                {{ isset($item) ? 'Edit Item' : 'Tambah Item' }}
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ isset($item) ? route('items.update',$item) : route('items.store') }}">
                @csrf
                @if(isset($item)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Item</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-tag-fill"></i></span>
                        <input type="text" name="nama_item" class="form-control"
                               value="{{ old('nama_item', $item->nama_item ?? '') }}"
                               placeholder="Masukkan nama item" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">UOM / Satuan</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-rulers"></i></span>
                        <input type="text" name="uom" class="form-control"
                               value="{{ old('uom', $item->uom ?? '') }}"
                               placeholder="Contoh: pcs, box, kg">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga Beli</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-cash-stack"></i></span>
                        <input type="number" name="harga_beli" class="form-control"
                               value="{{ old('harga_beli', $item->harga_beli ?? 0) }}"
                               placeholder="Masukkan harga beli">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga Jual</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                        <input type="number" name="harga_jual" class="form-control"
                               value="{{ old('harga_jual', $item->harga_jual ?? 0) }}"
                               placeholder="Masukkan harga jual">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('items.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Batal
                    </a>
                    <button class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
