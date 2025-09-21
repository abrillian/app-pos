@extends('layouts.app')
@section('content')
<h3>Edit Identitas</h3>
<form method="POST" action="{{ route('identitas.update',$identitas) }}">
  @csrf @method('PUT')
  <div class="mb-3"><label>Nama</label>
    <input type="text" name="nama_identitas" class="form-control" value="{{ $identitas->nama_identitas }}">
  </div>
  <div class="mb-3"><label>Email</label>
    <input type="text" name="email" class="form-control" value="{{ $identitas->email }}">
  </div>
  <div class="mb-3"><label>Telp</label>
    <input type="text" name="telp" class="form-control" value="{{ $identitas->telp }}">
  </div>
  <button class="btn btn-primary">Simpan</button>
</form>
@endsection
