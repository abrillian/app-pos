@extends('layouts.app')
@section('content')
<h3>{{ isset($user) ? 'Edit' : 'Tambah' }} User</h3>
<form method="POST" action="{{ isset($user) ? route('users.update',$user) : route('users.store') }}">
  @csrf
  @if(isset($user)) @method('PUT') @endif
  <div class="mb-3"><label>Nama</label>
    <input type="text" name="nama_user" class="form-control" value="{{ $user->nama_user ?? '' }}" required>
  </div>
  <div class="mb-3"><label>Username</label>
    <input type="text" name="username" class="form-control" value="{{ $user->username ?? '' }}" required>
  </div>
  <div class="mb-3"><label>Password</label>
    <input type="password" name="password" class="form-control">
    <small>Kosongkan jika tidak ingin ubah password</small>
  </div>
  <div class="mb-3"><label>Level</label>
    <select name="level_id" class="form-control">
      @foreach($levels as $l)
      <option value="{{ $l->id }}" @if(isset($user)&&$user->level_id==$l->id) selected @endif>{{ $l->level }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Simpan</button>
</form>
@endsection
