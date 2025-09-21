@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Daftar Items</h3>
        <a href="{{ route('items.create') }}" class="btn btn-warning">
            <i class="bi bi-plus-circle"></i> Tambah Item
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama</th>
                        <th>UOM/Satuan</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $i)
                        <tr>
                            <td>{{ $i->nama_item }}</td>
                            <td>{{ $i->uom }}</td>
                            <td>{{ number_format($i->harga_beli,0,',','.') }}</td>
                            <td>{{ number_format($i->harga_jual,0,',','.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('items.edit', $i) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="bi bi-pencil"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('items.destroy', $i) }}" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')" title="Hapus">
                                        <i class="bi bi-trash"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data item</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        {{ $items->links() }}
    </div>

</div>

@endsection
