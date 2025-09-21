@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-light">
            <h5 class="mb-0">{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
                @csrf
                @if(isset($user)) @method('PUT') @endif

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_user" class="form-control"
                           value="{{ $user->nama_user ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control"
                           value="{{ $user->username ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    <div class="form-text">Kosongkan jika tidak ingin mengubah password</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Level User</label>
                    <select name="level_id" class="form-select">
                        @foreach($levels as $l)
                            <option value="{{ $l->id }}" 
                                @if(isset($user) && $user->level_id == $l->id) selected @endif>
                                {{ $l->level }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">
                        <i class="bi bi-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
