@extends('layouts.app')
@section('content')
<h3>Identitas Perusahaan</h3>
@if($identitas)
  <p><b>Nama:</b> {{ $identitas->nama_identitas }}</p>
  <p><b>Email:</b> {{ $identitas->email }}</p>
  <p><b>Telp:</b> {{ $identitas->telp }}</p>
  <a href="{{ route('identitas.edit',$identitas) }}" class="btn btn-warning">Edit</a>
@else
  <p>Belum ada data identitas</p>
@endif
@endsection
