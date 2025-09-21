@extends('layouts.app')
@section('content')
<h3>{{ isset($item) ? 'Edit' : 'Tambah' }} Item</h3>
<form method="POST" action="{{ isset($item) ? route('items.update',$item) : route('items.store') }}">
  @csrf
  @if(isset($item)) @method('PUT') @endif
  <div class="mb-3"><label>Nama Item</label>
    <input type="text" name="nama_item" class="form-control" value="{{ $item->nama_item ?? '' }}" required>
  </div>
  <div class="mb-3"><label>UOM/Satuan</label>
    <input type="text" name="uom" class="form-control" value="{{ $item->uom ?? '' }}">
  </div>
  <div class="mb-3"><label>Harga Beli</label>
    <input type="number" name="harga_beli" class="form-control" value="{{ $item->harga_beli ?? 0 }}">
  </div>
  <div class="mb-3"><label>Harga Jual</label>
    <input type="number" name="harga_jual" class="form-control" value="{{ $item->harga_jual ?? 0 }}">
  </div>
  <button class="btn btn-primary">Simpan</button>
</form>
@endsection
