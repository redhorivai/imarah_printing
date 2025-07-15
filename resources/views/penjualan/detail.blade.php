@extends('layouts.app')
@section('content')
    <div>
        <a href="/penjualan" class="btn btn-success mb-3">Kembali Kesemua Produk</a>
        <a href="{{ route('penjualan.edit', $penjualan->id) }}" class="btn btn-warning mb-3">Edit</a>
        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="POST" class="d-inline"
            onsubmit="return confirm('Yakin ingin menghapus?')">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </div>
    <div>
        <h1>Judul {{ $penjualan->nama_produk }}</h1>
    </div>
    <div>
        <img src="{{ asset('storage/' . $penjualan->foto_produk) }}" width="200" alt="Foto Produk Sebelumnya">
    </div>
    <div>
        <h5> Nama Slug : {{ $penjualan->nama_slug }}</h5>
    </div>
    <div>
        <h5> Harga Rp.{{ $penjualan->harga }}</h5>
    </div>
    <div>
        <h5> Kategori {{ $penjualan->kategori }}</h5>
    </div>
    <div>

        <h5>Deksripsi : {{ $penjualan->deskripsi }}</h5>

    </div>
@endsection
