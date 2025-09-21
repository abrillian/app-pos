@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-person-plus-fill me-2"></i> 
                {{ isset($customer) ? 'Edit Customer' : 'Tambah Customer' }}
            </h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ isset($customer) ? route('customers.update',$customer) : route('customers.store') }}">
                @csrf
                @if(isset($customer)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" name="nama_customer" class="form-control" 
                               value="{{ old('nama_customer', $customer->nama_customer ?? '') }}" 
                               placeholder="Masukkan nama customer" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Alamat</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                        <textarea name="alamat" class="form-control" placeholder="Masukkan alamat lengkap">{{ old('alamat', $customer->alamat ?? '') }}</textarea>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Telp</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                        <input type="text" name="telp" class="form-control" 
                               value="{{ old('telp', $customer->telp ?? '') }}" 
                               placeholder="Nomor telepon">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Fax</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-printer-fill"></i></span>
                        <input type="text" name="fax" class="form-control" 
                               value="{{ old('fax', $customer->fax ?? '') }}" 
                               placeholder="Nomor fax (opsional)">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                        <input type="email" name="email" class="form-control" 
                               value="{{ old('email', $customer->email ?? '') }}" 
                               placeholder="Alamat email customer">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">
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
