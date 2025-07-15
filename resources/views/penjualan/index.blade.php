@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('penjualan.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualans as $item)
                    <tr>
                        <td>
                            @if ($item->foto_produk)
                                <img src="{{ asset('storage/' . $item->foto_produk) }}" width="80">
                            @endif
                            {{-- @if ($item->kategori == 'digital_printing')
                                $k = "Digital Printing";
                            @elseif ($item->kategori == 'spanduk')
                                $k = "Spanduk";
                            @else
                                $k = "Poster";
                            @endif --}}
                        </td>
                        <td>{{ $item->nama_produk }}</td>
                        <td>{{ $item->harga }}</td>
                        <td>{{ $k }}</td>
                        <td>
                            <a href="{{ route('penjualan.show', $item->id) }}" class="btn btn-light btn-sm"><i
                                    class="fa fa-eye">View</i></a>
                            <a href="{{ route('penjualan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('penjualan.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
