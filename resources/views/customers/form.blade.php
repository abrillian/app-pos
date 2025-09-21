@extends('layouts.app')
@section('content')
<h3>{{ isset($customer) ? 'Edit' : 'Tambah' }} Customer</h3>
<form method="POST" action="{{ isset($customer) ? route('customers.update',$customer) : route('customers.store') }}">
  @csrf
  @if(isset($customer)) @method('PUT') @endif
  <div class="mb-3"><label>Nama</label>
    <input type="text" name="nama_customer" class="form-control" value="{{ $customer->nama_customer ?? '' }}" required>
  </div>
  <div class="mb-3"><label>Alamat</label>
    <textarea name="alamat" class="form-control">{{ $customer->alamat ?? '' }}</textarea>
  </div>
  <div class="mb-3"><label>Telp</label>
    <input type="text" name="telp" class="form-control" value="{{ $customer->telp ?? '' }}">
  </div>
  <div class="mb-3"><label>Fax</label>
    <input type="text" name="fax" class="form-control" value="{{ $customer->fax ?? '' }}">
  </div>
  <div class="mb-3"><label>Email</label>
    <input type="text" name="email" class="form-control" value="{{ $customer->email ?? '' }}">
  </div>
  <button class="btn btn-primary">Simpan</button>
</form>
@endsection
